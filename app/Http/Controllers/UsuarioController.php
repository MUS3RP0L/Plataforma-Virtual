<?php

namespace Muserpol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;
use Muserpol\User;
use Datatables;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }

    public function UsuariosData()
    {

        $users = User::select(['id', 'ape', 'nom', 'tel','role','status'])->where('id', '>', 1);

        return Datatables::of($users)->addColumn('action', function ($user) {
                return '<a href="usuario/'.$user->id.'/edit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                <a href="usuario/'.$user->id.'/edit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ban-circle"></i> bloquear</a>
                        ';
            })
            ->editColumn('name', '{{$ape}} {{$nom}}')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $role = array('fondo_retiro' => 'Fondo de Retiro','complemento' => 'Complemento Económico');
        
        $data = array(
            'role' => $role,
        );

        return view('usuarios.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = array('fondo_retiro' => 'Fondo de Retiro','complemento' => 'Complemento Económico');
        
        $data = array(
            'role' => $role,
        );

        $user = User::where('id', '=', $id)->firstOrFail();

        $data = [
            'role' => $role,
            'user' => $user
        ];

        return View('usuarios.edit', $data);
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

        if ($id) {
            $rules = [
                'ape' => 'required|min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
                'nom' => 'required|min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
                'tel' => 'required|min:8',
                'username' => 'required|unique:users,username,'.$id,
                'role' => 'required'
            ];
        }
        else{ 
            $rules = [
                'ape' => 'required|min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
                'nom' => 'required|min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
                'tel' => 'required|min:8',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:6|confirmed',
                'role' => 'required'
            ];
        } 
        
        $messages = [
            'ape.required' => 'El campo apellidos es requerido',
            'ape.min' => 'El mínimo de caracteres permitidos para apellidos es 3', 
            'ape.regex' => 'Sólo se aceptan letras para apellidos',

            'nom.required' => 'El campo nombre requerido',
            'nom.min' => 'El mínimo de caracteres permitidos para nombre es 3',
            'nom.regex' => 'Sólo se aceptan letras para nombre',

            'username.required' => 'El campo nombre de usuario requerido',
            'username.min' => 'El mínimo de caracteres permitidos para nombre de usuario es 5',
            'username.unique' => 'El nombre de usuario ya existe',

            'password.required' => 'El campo contraseña es requerido',
            'password.min' => 'El mínimo de caracteres permitidos son 6',
            'password.confirmed' => 'Los passwords no coinciden',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect($id ? 'usuario/'.$id.'/edit' : 'usuario/create')
            ->withErrors($validator)
            ->withInput();
        }
        else{

            if ($id) {
                $user = User::where('id', '=', $id)->firstOrFail();
            } else {
                $user = new User();
            } 
                
            $user->ape = trim($request->ape);
            $user->nom = trim($request->nom);
            $user->tel = trim($request->tel);
            $user->username = trim($request->username);
            if($request->password){
                $user->password = trim(bcrypt($request->password));
            }
            $user->role = trim($request->role); 

            $user->save();

            if ($id) {
                $message = "Usuario Actualizado con exito";
            } else {
                $message = "Usuario Creado con exito";
            }

            Session::flash('message', $message);
        }
        
        return redirect('usuario');
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
}
