<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\Afiliado;
use Muserpol\Aporte;
use Muserpol\Grado;
use Muserpol\Unidad;
use Muserpol\AfiState;
use Datatables;
use Muserpol\Helper\Util;
use Carbon\Carbon;
use Illuminate\Support\Collection;


class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('afiliados.index');

    }

    public function afiliadosData()
    {
        $afiliados = Afiliado::select(['id', 'ci', 'pat', 'mat', 'nom', 'nom2', 'matri', 'afi_state_id'])->get();

        return Datatables::of($afiliados)
                ->addColumn('gra', function ($afiliado) { return Aporte::afiliadoId($afiliado->id)->orderBy('id', 'desc')->first()->grado->abre; })
                ->addColumn('mons', function ($afiliado) { return $afiliado->nom .' '. $afiliado->nom2; })
                ->addColumn('action', function ($afiliado) { 
                    return  '<div class="row text-center">
                            <a href="afiliado/'.$afiliado->id.'" ><i class="glyphicon glyphicon-zoom-in"></i> Ver </a>&nbsp;|&nbsp;
                            <a href="afiliado/'.$afiliado->id. '/edit" ><i class="glyphicon glyphicon-pencil"></i> Editar </a></div>';})

                ->addColumn('est', function ($afiliado) { return $afiliado->afi_state->name; })
                ->make(true);
    }


    public function RegPagoData(Request $request)
    {   
        $afiliado = Afiliado::idIs($request->id)->firstOrFail();

        $gestiones = new Collection;

        $from = Carbon::parse($afiliado->fech_ing);

        $to = Carbon::now();
        
        $to->diffInHours($from);

        for ($i=$from->year; $i <= $to->year ; $i++) { 
            
            $base = array();
            $mes = array();

            for ($j=1; $j <= 12; $j++) { 

                $aportes = Aporte::select(['gest'])
                                    ->where('afiliado_id', $request->id)
                                    ->where('gest', '=',Carbon::createFromDate($i, $j, 1)->toDateString())
                                    ->first();   
     
                if ($aportes) {
                    $mes["m".$j] = 1;
                }else{
                   $mes["m".$j] = 0;
                }
                $base = array_merge($base, $mes);
            }
            $year = array('year'=> $i);

            $gestiones->push([
                'year'         => $year,
            ]);
           // $gestiones[] = array_merge($year, $base);

        }

        // return $gestiones;
        return Datatables::of($gestiones)->make(true);
        // return  $to->diffInYears($from);

        // return Datatables::of($gestiones)
                        // ->editColumn('anio', function ($aportes) { return $aportes->mes . "-" . $aportes->anio; })
                        // ->editColumn('grado_id', function ($aportes) { return $aportes->grado->niv . "-" . $aportes->grado->grad; })
                        // ->editColumn('unidad_id', function ($aportes) { return $aportes->unidad->cod; })
                        // ->editColumn('mus', function ($aportes) { return Util::formatMoney($aportes->mus); })
                        // ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $afiliado = Afiliado::idIs($id)->firstOrFail();

        $firstAporte = Aporte::afiliadoId($afiliado->id)->orderBy('gest', 'asc')->firstOrFail();
        $lastAporte = Aporte::afiliadoId($afiliado->id)->orderBy('gest', 'desc')->firstOrFail();

        $firstAporte->desde = Util::getMes(Carbon::parse($firstAporte->gest)->month) . " de " . Carbon::parse($firstAporte->gest)->year;
        
        $lastAporte->hasta = Util::getMes(Carbon::parse($lastAporte->gest)->month) . " de " . Carbon::parse($lastAporte->gest)->year;

        $totalGanado = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.gan) as ganado'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();

        foreach ($totalGanado as $item) {
            $ganado = $item->ganado;
        }

        $totalSegCiu = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.b_seg) as SegCiu'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();

        foreach ($totalSegCiu as $item) {
            $SegCiu = $item->SegCiu;
        }

        $totalCotizable = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.cot) as cotizable'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalCotizable as $item) {
            $cotizable = $item->cotizable;
        }

        $totalMuserpol = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.mus) as muserpol'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalMuserpol as $item) {
            $muserpol = $item->muserpol;
        }

        $cotizablefinal = $cotizable;

        $Fon = Util::calcFon($muserpol);

        $SegVid = Util::calcVid($muserpol);

        $data = array(
            'afiliado' => $afiliado,
            'lastAporte' => $lastAporte,
            'firstAporte' => $firstAporte,
            'totalGanado' => Util::formatMoney($ganado),
            'totalSegCiu' => Util::formatMoney($SegCiu),
            'totalCotizable' => Util::formatMoney($cotizable),
            'totalCotizableAd' => Util::formatMoney($cotizablefinal),
            'totalFon' => $Fon,
            'totalSegVid' => $SegVid,
            'totalMuserpol' => Util::formatMoney($muserpol)
        );

        return view('afiliados.view', $data);
    }

    public function afiliadoReporte($id)
    {
        $afiliado = Afiliado::idIs($id)->with('aportes')->orderBy('id', 'desc')->firstOrFail();

        $firstAporte = Aporte::afiliadoId($afiliado->id)->orderBy('anio', 'asc')->orderBy('mes', 'asc')->firstOrFail();

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $firstAporte->desde = Util::getMes($firstAporte->mes) .' - '.  $firstAporte->anio;

        $lastAporte = Aporte::afiliadoId($afiliado->id)->orderBy('anio', 'desc')->orderBy('mes', 'desc')->firstOrFail();

        $lastAporte->hasta = Util::getMes($lastAporte->mes) .' - '.  $lastAporte->anio;

        $grado = Grado::where('niv', $lastAporte->niv)->where('grad', $lastAporte->gra)->firstOrFail();
        $unidad = Unidad::where('cod', $lastAporte->uni)->firstOrFail();


        $totalGanado = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.gan) as ganado'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalGanado as $item) {
            $ganado = $item->ganado;
        }

        $totalSegCiu = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.b_seg) as SegCiu'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalSegCiu as $item) {
            $SegCiu = $item->SegCiu;
        }

        $totalCotizable = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.cot) as cotizable'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalCotizable as $item) {
            $cotizable = $item->cotizable;
        }

        $totalMuserpol = DB::table('afiliados')
                ->select(DB::raw('SUM(aportes.mus) as muserpol'))
                ->leftJoin('aportes', 'afiliados.id', '=', 'aportes.afiliado_id')
                ->where('afiliados.id', '=', $afiliado->id)
                ->get();
        foreach ($totalMuserpol as $item) {
            $muserpol = $item->muserpol;
        }

        //add item 0 +
        $cotizablefinal = $cotizable;

        $Fon = Util::calcFon($muserpol);

        $SegVid = Util::calcVid($muserpol);

        $data = array(
            'afiliado' => $afiliado,
            'lastAporte' => $lastAporte,
            'firstAporte' => $firstAporte,
            'grado' => $grado,
            'unidad' => $unidad,
            'totalGanado' => Util::formatMoney($ganado),
            'totalSegCiu' => Util::formatMoney($SegCiu),
            'totalCotizable' => Util::formatMoney($cotizable),
            'totalCotizableAd' => Util::formatMoney($cotizablefinal),
            'totalFon' => $Fon,
            'totalSegVid' => $SegVid,
            'totalMuserpol' => Util::formatMoney($muserpol)
        );

        return view('afiliados.report', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $afiliado = Afiliado::where('id', '=', $id)->firstOrFail();

        if ($afiliado->sex == 'M') {
            $list_est_civ = array('' => '','C' => 'CASADO','S' => 'SOLTERO','V' => 'VIUDO','D' => 'DIVIRCIADO');
        }elseif ($afiliado->sex == 'F') {
            $list_est_civ = array('' => '','C' => 'CASADA','S' => 'SOLTERA','V' => 'VIDUA','D' => 'DIVIRCIADA');
        }

        $afi_states = AfiState::all();

        foreach ($afi_states as $item) {
             $list_afi_states[$item->id]=$item->name;
        }

        $unidades = Unidad::all();

        foreach ($unidades as $item) {
             $list_unidades[$item->id]=$item->cod . " | " . $item->lit;
        }

        $grados = Grado::all();

        foreach ($grados as $item) {
             $list_grados[$item->id]=$item->niv. "-" .$item->grad . " | " . $item->lit;
        } 

        $data = [
            'afiliado' => $afiliado,
            'list_est_civ' => $list_est_civ,
            'list_afi_states' => $list_afi_states,
            'list_unidades' => $list_unidades,
            'list_grados' => $list_grados,
        ];
        
        return View('afiliados.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function save($request, $id = false)
    {
        $rules = [
            'pat' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'mat' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'nom' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'nom2' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'ap_esp' => 'min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
        ];

        $messages = [

            'pat.min' => 'El mínimo de caracteres permitidos para apellido paterno es 3', 
            'pat.regex' => 'Sólo se aceptan letras para apellido paterno',

            'mat.min' => 'El mínimo de caracteres permitidos para apellido materno es 3',
            'mat.regex' => 'Sólo se aceptan letras para apellido materno',

            'nom.min' => 'El mínimo de caracteres permitidos para primer nombre es 3',
            'nom.regex' => 'Sólo se aceptan letras para primer nombre',

            'nom2.min' => 'El mínimo de caracteres permitidos para teléfono de usuario es 3',
            'nom2.regex' => 'Sólo se aceptan letras para segundo nombre',

            'ap_esp.min' => 'El mínimo de caracteres permitidos para estado civil es 3',
            'ap_esp.regex' => 'Sólo se aceptan letras para estado civil',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('afiliado/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }
        else{

            $afiliado = Afiliado::where('id', '=', $id)->firstOrFail();
                
            $afiliado->pat = trim($request->pat);
            $afiliado->mat = trim($request->mat);
            $afiliado->nom = trim($request->nom);
            $afiliado->nom2 = trim($request->nom2);
            $afiliado->est_civ = trim($request->est_civ); 
            $afiliado->ap_esp = trim($request->ap_esp); 

            $afiliado->afi_state_id = $request->afi_state_id; 
            $afiliado->unidad_id = $request->unidad_id; 
            $afiliado->grado_id = $request->grado_id;

            $afiliado->zona = trim($request->zona);
            $afiliado->num_domi = trim($request->num_domi);
            $afiliado->email = trim($request->email);
            $afiliado->calle = trim($request->calle);
            $afiliado->tele = trim($request->tele);
            $afiliado->celu = trim($request->celu);

            $afiliado->save();

            $message = "Afiliado Actualizado con éxito";

            Session::flash('message', $message);
        }
        
        return redirect('afiliado/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search()
    {
        return view('afiliados.search');
    }

    public function go_search(Request $request)
    {
        $rules = [
            'search' => 'required',
        ];
        
        $messages = [
            'search.required' => 'El campo es requerido para realizar la búsqueda del Afiliado.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect("/")
            ->withErrors($validator)
            ->withInput();
        }
        else{

        $afiliado = Afiliado::ciIs($request->search)->first();

            if($afiliado){
                return redirect("afiliado/{$afiliado->id}");
            }
            else{
                    $message = "No logramos encontrar al Afiliado con Carnet: ".$request->search;

                    Session::flash('message', $message);
                
                return redirect("/");
            }

        }

    }



}
