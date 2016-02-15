<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest', ['except' => 'getLogout']);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function postLogin(Request $request)
    {
    
        if (Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                    'active' => 1
                ]
                , $request->has('remember')
                )){
            return redirect()->intended($this->redirectPath());
        }
        else{
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            
            $messages = [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El formato de email es incorrecto',
                'password.required' => 'El campo password es requerido',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            return redirect('login')
            ->withErrors($validator)
            ->withInput();
        }
    }




}
