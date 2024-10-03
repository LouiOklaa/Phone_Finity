<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\GeneralInformation;
use App\Models\handys;
use App\Models\Services;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $information = GeneralInformation::first();
        $handys = handys::all();
        $services = Services::all();
        $accessories = accessories::all();
        return view('index' , compact('information' , 'handys' , 'services' , 'accessories'));
    }
}
