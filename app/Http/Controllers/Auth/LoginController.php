<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function login()
    {
        return view('home.pages.auth.login.login');
    }
    public function loginAjax(Request $request)
    {
        $message = new MessageBag();
        $input = $request->all();
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $message->add('success', "Pomyślnie zalogowano!");
            return $message->jsonSerialize();
        }else{
            $message->add('error', "Zły login lub hasło!");
            return $message->jsonSerialize();
        }
    }
}
