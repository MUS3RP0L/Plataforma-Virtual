<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
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
        // $users = User::select(['id', 'name', 'email']);

        // return Datatables::of($users)->addColumn('action', function ($user) {
        //         return '<a href="usuario/'.$user->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar Usuario</a>';
        //     })
        //     ->editColumn('id', 'ID: {{$id}}')
        //     ->make(true);

        $users = User::select(['id', 'name', 'email']);

        return Datatables::of($users)->addColumn('action', function ($user) {
                return ' <div class="btn-group">
                            <a href="bootstrap-elements.html" data-target="#" class="btn btn-raised dropdown-toggle" data-toggle="dropdown">
                                Opciones
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="usuario/'.$user->id.'/edit"><i class="glyphicon glyphicon-edit"></i> Editar Usuario</a></li>
                            </ul>
                        </div>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();

        $data = [
            'user' => $user,
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
        // $user = User::where('id', '=', $id)->firstOrFail();
        // return $request->name;
    }

    public function save($request, $id = false)
    {

        if ($id) {
            $rules = [
            'name' => 'required|min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'email' => 'required|email',
            ];
        }
        else{ 
            $rules = [
                'name' => 'required|min:3|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ];
        } 
        
        $messages = [
            'name.required' => 'El campo es requerido',
            'name.min' => 'El mínimo de caracteres permitidos son 3',
            'name.regex' => 'Sólo se aceptan letras',
            'email.required' => 'El campo Correo Electrónico es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'email.unique' => 'El email ya existe',
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
                $user->name = trim($request->name);
                $user->email = trim($request->email);
                if($request->password){
                    $user->password = trim(bcrypt($request->password));
                }

            } else {
                $user = new User();
                $user->name = trim($request->name);
                $user->email = trim($request->email);
                $user->password = trim(bcrypt($request->password));
                $user->role = 'fondo_retiro';

            }

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
