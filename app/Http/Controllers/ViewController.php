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

        return view('Handys.show_all_mobiles', compact('handys'));
    }

    public function sortMobiles(Request $request)
    {
        $query = handys::query();

        if ($request->has('category') && $request->has('status')) {
            $query->where('section_name', $request->get('category'))->where('status' , $request->get('status'))->get();
        }

        // Check the sorting method and apply the appropriate sorting.
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'name':
                    $query->orderBy('name', 'asc');
                    break;
                case 'price1':
                    $query->orderBy('preis', 'asc');
                    break;
                case 'price2':
                    $query->orderBy('preis', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }

        $handys = $query->get();

        return view('Handys.show_mobiles', compact('handys'));
    }

    public function sortAllMobiles(Request $request)
    {
        $query = handys::query();

        // Check the sorting method and apply the appropriate sorting.
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'name':
                    $query->orderBy('name', 'asc');
                    break;
                case 'price1':
                    $query->orderBy('preis', 'asc');
                    break;
                case 'price2':
                    $query->orderBy('preis', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }

        $handys = $query->get();

        return view('Handys.show_all_mobiles', compact('handys'));
    }

    public function showAccessories(Request $request , $brand = null , $section_name = null)
    {

        if ($request->routeIs('show_accessories')){

            $accessories = accessories::where('brand' , $brand)->where('section_name', $section_name)->get();
            return view('Accessories.show_accessories', compact('accessories'));

        }

        else{

            $accessories = accessories::all();
            return view('Accessories.show_all_accessories', compact('accessories'));
        }


    }

    public function sortAccessories(Request $request)
    {
        $query = Accessories::query();

        if ($request->has('brand') && $request->has('section_name')) {
            $query->where('brand', $request->get('brand'))->where('section_name' , $request->get('section_name'))->get();
        }


        // Check the sorting method and apply the appropriate sorting.
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'name':
                    $query->orderBy('name', 'asc');
                    break;
                case 'price1':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price2':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }

        $accessories = $query->get();

        return view('Accessories.show_accessories', compact('accessories'));
    }

    public function sortAllAccessories(Request $request)
    {
        $query = Accessories::query();

        // Check the sorting method and apply the appropriate sorting.
        if ($request->has('sort')) {
            switch ($request->get('sort')) {
                case 'name':
                    $query->orderBy('name', 'asc');
                    break;
                case 'price1':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price2':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }

        $accessories = $query->get();

        return view('Accessories.show_all_accessories', compact('accessories'));
    }

}
