<?php

namespace Muserpol\Http\Controllers\User;

use Illuminate\Http\Request;
use Muserpol\Http\Requests;
use Muserpol\Http\Controllers\Controller;

use Auth;
use Validator;
use Session;
use Datatables;
use Util;

use Muserpol\User;
use Muserpol\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::user()->can('manage')) {

            return view('users.index');

        }else {

            return redirect('/');

        }
    }

    public function Data()
    {
        $users = User::select(['id','username', 'first_name', 'last_name', 'phone','role_id','status'])->where('id', '>', 1);

        return Datatables::of($users)
            ->addColumn('name', function ($user) { return Util::ucw($user->first_name) . ' ' . Util::ucw($user->last_name); })
            ->addColumn('role', function ($user) { return $user->role->name; })
            ->addColumn('status', function ($user) { return $user->status == 'active' ? 'Activo' : 'Inactivo'; })
            ->addColumn('action', function ($user) { return  $user->status == "active" ?
                        '<div class="btn-group" style="margin:-3px 0;">
                            <a href="user/ '.$user->id.'/edit " class="btn btn-primary btn-raised btn-sm">&nbsp;&nbsp;<i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;</a>
                            <a href="" class="btn btn-primary btn-raised btn-sm dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="caret"></span>&nbsp;</a>
                            <ul class="dropdown-menu">
                                <li><a href="user/block/ '.$user->id.' " style="padding:3px 10px;"><i class="glyphicon glyphicon-ban-circle"></i> Bloquear</a></li>
                            </ul>
                        </div>' :
                        '<div class="btn-group" style="margin:-3px 0;">
                            <a href="user/ '.$user->id.'/edit " class="btn btn-primary btn-raised btn-sm">&nbsp;&nbsp;<i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;</a>
                            <a href="" class="btn btn-primary btn-raised btn-sm dropdown-toggle" data-toggle="dropdown">&nbsp;<span class="caret"></span>&nbsp;</a>
                            <ul class="dropdown-menu">
                                <li><a href="user/unblock/ '.$user->id.' " style="padding:3px 10px;"><i class="glyphicon glyphicon-ok-circle"></i> Activar</a></li>
                            </ul>
                        </div>';})->make(true);
    }
                
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function getViewModel()
    {
        $roles = Role::all();
        $list_roles = array('' => '');
        foreach ($roles as $item) {
             $list_roles[$item->id]=$item->name;
        }

        return [

            'list_roles' => $list_roles

        ];
    }

    public function create()
    {
        if (Auth::user()->can('manage')) {

            return view('users.create', self::getViewModel());

        }else{

            return redirect('/');

        }   
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

    public function edit($user)
    {   
        $data = [

            'user' => $user

        ];

        $data = array_merge($data, self::getViewModel());

        return View('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $user)
    {

        return $this->save($request, $user);
    }

    public function save($request, $user = false)
    {

        if ($user) {

            $rules = [

                'last_name' => 'required|min:3|regex:/^[A-ZÑa-záéíóúàèìòùäëïöüñ\s]+$/i',
                'first_name' => 'required|min:3|regex:/^[A-ZÑa-záéíóúàèìòùäëïöüñ\s]+$/i',
                'phone' => 'required|min:8|numeric',
                'username' => 'required|unique:users,username,'.$user->id,

            ];
        }
        else { 

            $rules = [

                'last_name' => 'required|min:3|regex:/^[A-ZÑa-záéíóúàèìòùäëïöüñ\s]+$/i',
                'first_name' => 'required|min:3|regex:/^[A-ZÑa-záéíóúàèìòùäëïöüñ\s]+$/i',
                'phone' => 'required|min:8|numeric',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:6|confirmed',
                'role' => 'required'

            ];
        }
        
        $messages = [

            'first_name.required' => 'El campo nombre requerido',
            'first_name.min' => 'El mínimo de caracteres permitidos en nombre es 3',
            'first_name.regex' => 'Sólo se aceptan letras para nombre',


            'last_name.required' => 'El campo apellidos es requerido',
            'last_name.min' => 'El mínimo de caracteres permitidos en apellido es 3', 
            'last_name.regex' => 'Sólo se aceptan letras para apellidos',

            'phone.required' => 'El campo teléfono es requerido',
            'phone.min' => 'El mínimo de caracteres permitidos en teléfono de usuario es 8',
            'phone.numeric' => 'El campo teléfono tiene q ser númerico',

            'username.required' => 'El campo nombre de usuario requerido',
            'username.min' => 'El mínimo de caracteres permitidos en nombre de usuario es 5',
            'username.unique' => 'El nombre de usuario ya existe',

            'password.required' => 'El campo contraseña es requerido',
            'password.min' => 'El mínimo de caracteres permitidos en contraseña es 6',
            'password.confirmed' => 'Las contraseñas no coinciden',

            'role.required' => 'El campo tipo de usuario es requerido'
            
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            
            return redirect($user ? 'user/'.$user->id.'/edit' : 'user/create')
            ->withErrors($validator)
            ->withInput();
        }
        else{

            if ($user) {

                $message = "Usuario Actualizado con éxito";

            }else {

                $user = new User();
                $message = "Usuario Creado con éxito";
            }

            $user->first_name = trim($request->first_name);
            $user->last_name = trim($request->last_name);
            $user->phone = trim($request->phone);
            $user->username = trim($request->username);
            if($request->password){$user->password = bcrypt(trim($request->password));}
            if($request->role){$user->role_id = $request->role;}
            $user->save();

            Session::flash('message', $message);
        }
        
        return redirect('user');
    }

    public function Block($user)
    {
        $user->status = "inactive";
        $user->save();
        $message = "Usuario Bloqueado";
        Session::flash('message', $message);
        return redirect('user');
    }

    public function Unblock($user)
    {
        $user->status = "active";
        $user->save();
        $message = "Usuario Activado";
        Session::flash('message', $message);
        return redirect('user');
    }
}
