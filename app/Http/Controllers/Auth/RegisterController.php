<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use function Sodium\add;

class RegisterController extends Controller
{
    public function register()
    {
        return view('home.pages.auth.register.register');
    }
    public function registerAjax(Request $request)
    {
        $request ->validate([
            'login' => 'required|string|unique:users',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required|string|min:6'
        ]);

        $message = new MessageBag();
        $input = $request->all();
        if(User::create(['login'=>strtolower($input['login']),'email'=>strtolower($input['email']),'password'=>bcrypt($input['password'])]))
        return $message->add('success', "Pomyślnie utworzono konto, na email wysłaliśmy ci link aktywacyjny!")->jsonSerialize();
        else
            return  $message->add('error', "Wystąpił błąd!")->jsonSerialize();

    }
}
