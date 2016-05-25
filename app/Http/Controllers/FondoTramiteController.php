<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;

use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use DB;
use Auth;
use Validator;
use Session;
use Datatables;
use Carbon\Carbon;
use Muserpol\Helper\Util;

use Muserpol\Calificacion;
use Muserpol\Afiliado;
use Muserpol\Aporte;
use Muserpol\Departamento;
use Muserpol\Conyuge;
use Muserpol\Solicitante;
use Muserpol\Modalidad;
use Muserpol\Requisito;

class FondoTramiteController extends Controller
{
    public static function getViewModel()
    {
        $modalidades = Modalidad::all();
        $list_modalidades = array('' => '');

        foreach ($modalidades as $item) {
             $list_modalidades[$item->id]=$item->name;
        }

        $requisitos = Requisito::all();
        $list_requisitos = array('' => '');
        foreach ($requisitos as $item) {
             $list_requisitos[$item->id]=$item->name;
        }

        return [
            'list_modalidades' => $list_modalidades,
            'list_requisitos' => $list_requisitos     
        ];
    }

    public function getData($afid){

        $afiliado = Afiliado::idIs($afid)->first();

        $conyuge = Conyuge::where('afiliado_id', '=', $afid)->first();
        if (!$conyuge) {
            $conyuge = new Conyuge;
        }

        $solicitante = Solicitante::where('afiliado_id', '=', $afid)->first();

        if (!$solicitante) {
                $solicitante = new Solicitante;
        }

        if ($solicitante->ci || $solicitante->pat || $solicitante->mat || $solicitante->nom || $solicitante->nom2) {
            $info_titu = 1;
        }else{
            $info_titu = 0;
        }

        $data = array(
            'afiliado' => $afiliado,
            'conyuge' => $conyuge,
            'solicitante' => $solicitante,
            'info_titu' => $info_titu,

        );

        $data = array_merge($data, self::getViewModel());

        return $data;

    }

    public function show($afid)
    {
        return view('fondotramite.create', self::getData($afid));
    }
}
