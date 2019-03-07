<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        $view = view('home.pages.index.index');
        return $view;
    }
}
