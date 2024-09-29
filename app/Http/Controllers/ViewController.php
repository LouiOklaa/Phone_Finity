<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $information = GeneralInformation::first();
        return view('index' , compact('information'));
    }
}
