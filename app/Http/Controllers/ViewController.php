<?php

namespace App\Http\Controllers;

use App\Models\abschnitte;
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
        $handys_sections = abschnitte::all();
        $services = Services::all();
        $accessories = accessories::all();
        return view('index' , compact('information' , 'handys' , 'services' , 'accessories' , 'handys_sections'));
    }

    public function showMobilesByCategory($section_name)
    {
        $information = GeneralInformation::first();
        // Fetch section based on name
        $handys = handys::where('section_name', $section_name)->get();
        $handys_sections = abschnitte::all();

        return view('Handys.new_mobiles', compact('handys' , 'information' , 'handys_sections'));
    }

}
