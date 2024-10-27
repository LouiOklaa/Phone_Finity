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
        $handys = handys::where('section_name', $section_name)->where('status' , 'Neu')->paginate(9);

        return view('Handys.show_mobiles', compact('handys'));
    }

    public function showUsedMobiles($section_name)
    {
        $handys = handys::where('section_name', $section_name)->where('status' , 'Gebraucht')->paginate(9);

        return view('Handys.show_mobiles', compact('handys'));
    }
    public function showMobiles()
    {
        $handys = handys::paginate(9);

        return view('Handys.show_all_mobiles', compact('handys'));
    }

    public function sortMobiles(Request $request)
    {
        $query = handys::query();

        if ($request->has('category') && $request->has('status')) {
            $query->where('section_name', $request->get('category'))->where('status', $request->get('status'));
        }

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $handys = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $handys->setCollection(
                match ($request->get('sort')) {
                    'name' => $handys->getCollection()->sortBy('name'),
                    'price1' => $handys->getCollection()->sortBy('preis'),
                    'price2' => $handys->getCollection()->sortByDesc('preis'),
                    'newest' => $handys->getCollection()->sortByDesc('created_at'),
                    'oldest' => $handys->getCollection()->sortBy('created_at'),
                    default => $handys->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $handys->appends($request->all());
        $html = view('Handys.partials_mobiles_list', compact('handys'))->render();

        return response()->json(['html' => $html]);
    }

    public function sortAllMobiles(Request $request)
    {
        $query = handys::query();

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $handys = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $handys->setCollection(
                match ($request->get('sort')) {
                    'name' => $handys->getCollection()->sortBy('name'),
                    'price1' => $handys->getCollection()->sortBy('preis'),
                    'price2' => $handys->getCollection()->sortByDesc('preis'),
                    'newest' => $handys->getCollection()->sortByDesc('created_at'),
                    'oldest' => $handys->getCollection()->sortBy('created_at'),
                    default => $handys->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $handys->appends($request->all());
        $html = view('Handys.partials_mobiles_list', compact('handys'))->render();

        return response()->json(['html' => $html]);
    }

    public function showAccessories(Request $request , $brand = null , $section_name = null)
    {

        if ($request->routeIs('show_accessories')){

            $accessories = accessories::where('brand' , $brand)->where('section_name', $section_name)->paginate(9);
            return view('Accessories.show_accessories', compact('accessories'));

        }

        else{

            $accessories = accessories::paginate(9);
            return view('Accessories.show_all_accessories', compact('accessories'));
        }

    }

    public function sortAccessories(Request $request)
    {
        $query = Accessories::query();

        if ($request->has('brand') && $request->has('section_name')) {
            $query->where('brand', $request->get('brand'))->where('section_name' , $request->get('section_name'));
        }

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $accessories = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $accessories->setCollection(
                match ($request->get('sort')) {
                    'name' => $accessories->getCollection()->sortBy('name'),
                    'price1' => $accessories->getCollection()->sortBy('price'),
                    'price2' => $accessories->getCollection()->sortByDesc('price'),
                    'newest' => $accessories->getCollection()->sortByDesc('created_at'),
                    'oldest' => $accessories->getCollection()->sortBy('created_at'),
                    default => $accessories->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $accessories->appends($request->all());
        $html = view('Accessories.partials_accessories_list', compact('accessories'))->render();

        return response()->json(['html' => $html]);
    }

    public function sortAllAccessories(Request $request)
    {
        $query = Accessories::query();

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $accessories = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $accessories->setCollection(
                match ($request->get('sort')) {
                    'name' => $accessories->getCollection()->sortBy('name'),
                    'price1' => $accessories->getCollection()->sortBy('price'),
                    'price2' => $accessories->getCollection()->sortByDesc('price'),
                    'newest' => $accessories->getCollection()->sortByDesc('created_at'),
                    'oldest' => $accessories->getCollection()->sortBy('created_at'),
                    default => $accessories->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $accessories->appends($request->all());
        $html = view('Accessories.partials_accessories_list', compact('accessories'))->render();

        return response()->json(['html' => $html]);
    }

}
