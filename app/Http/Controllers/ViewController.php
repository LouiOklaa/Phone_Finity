<?php

namespace App\Http\Controllers;

use App\Models\abschnitte;
use App\Models\Accessories;
use App\Models\accessories_sections;
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
        $accessories_brand = accessories::pluck('brand')->unique();
        return view('index' , compact('information' , 'handys' , 'services' , 'accessories' , 'handys_sections' , 'accessories_brand'));
    }

    public function showNewMobiles($section_name)
    {
        $handys = handys::where('section_name', $section_name)->where('status' , 'Neu')->get();

        return view('Handys.show_mobiles', compact('handys'));
    }

    public function showUsedMobiles($section_name)
    {
        $handys = handys::where('section_name', $section_name)->where('status' , 'Gebraucht')->get();

        return view('Handys.show_mobiles', compact('handys'));
    }
    public function showMobiles()
    {
        $handys = handys::all();

        return view('Handys.show_mobiles', compact('handys'));
    }

    public function showAccessories(Request $request , $brand = null , $section_name = null)
    {

        if ($request->routeIs('show_accessories')){

            $accessories = accessories::where('brand' , $brand)->where('section_name', $section_name)->get();

        }

        else{

            $accessories = accessories::all();

        }

        return view('Accessories.show_accessories', compact('accessories'));
    }

}
