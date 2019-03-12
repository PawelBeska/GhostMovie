<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function series()
    {
        return view('home.pages.series.series');
    }
    public function seriesAjax()
    {

    }
}
