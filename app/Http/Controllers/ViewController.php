<?php

namespace App\Http\Controllers;

use App\Models\abschnitte;
use App\Models\Accessories;
use App\Models\Gallery;
use App\Models\GeneralInformation;
use App\Models\handys;
use App\Models\Services;
use App\Models\ServicesSections;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $information = GeneralInformation::first();
        $handys = handys::all();
        $handys_sectionsNew = abschnitte::has('newMobiles')->get();
        $handys_sectionsUsed = abschnitte::has('usedMobiles')->get();
        $services = Services::all();
        $accessories = accessories::all();
        $accessories_brand = accessories::pluck('brand')->unique();
        $services_sections = ServicesSections::all();
        return view('index', compact('information', 'handys', 'services', 'accessories', 'handys_sectionsNew', 'handys_sectionsUsed', 'accessories_brand', 'services_sections'));
    }

    public function showNewMobiles($section_name)
    {
        $handys = handys::where('section_name', $section_name)->where('status', 'Neu')->paginate(9);

        return view('Handys.show_mobiles', compact('handys'));
    }

    public function showUsedMobiles($section_name)
    {
        $handys = handys::where('section_name', $section_name)->where('status', 'Gebraucht')->paginate(9);

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

    public function showAccessories(Request $request, $brand = null, $section_name = null)
    {

        if ($request->routeIs('show_accessories')) {

            $accessories = accessories::where('brand', $brand)->where('section_name', $section_name)->paginate(9);
            return view('Accessories.show_accessories', compact('accessories'));

        } else {

            $accessories = accessories::paginate(9);
            return view('Accessories.show_all_accessories', compact('accessories'));
        }

    }

    public function sortAccessories(Request $request)
    {
        $query = Accessories::query();

        if ($request->has('brand') && $request->has('section_name')) {
            $query->where('brand', $request->get('brand'))->where('section_name', $request->get('section_name'));
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

    public function showServices(Request $request, $section_name = null)
    {

        if ($request->routeIs('show_services')) {

            $section_name = str_replace('-', ' ', urldecode($section_name));
            $services = Services::where('section_name', $section_name)->paginate(9);

            return view('Services.show_services', compact('services'));

        } else {

            $services = Services::paginate(9);
            return view('Services.show_all_services', compact('services'));
        }

    }

    public function sortServices(Request $request)
    {
        $query = Services::query();

        if ($request->has('sectionName')) {
            $query->where('section_name', $request->get('sectionName'));
        }

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $services = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $services->setCollection(
                match ($request->get('sort')) {
                    'name' => $services->getCollection()->sortBy('name'),
                    'price1' => $services->getCollection()->sortBy('price'),
                    'price2' => $services->getCollection()->sortByDesc('price'),
                    'newest' => $services->getCollection()->sortByDesc('created_at'),
                    'oldest' => $services->getCollection()->sortBy('created_at'),
                    default => $services->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $services->appends($request->all());
        $html = view('Services.partials_services_list', compact('services'))->render();

        return response()->json(['html' => $html]);
    }

    public function sortAllServices(Request $request)
    {
        $query = Services::query();

        //paginate to get data for the page only
        $page = $request->get('page', 1);
        $services = $query->paginate(9, ['*'], 'page', $page);

        // Sort data within the current page only
        if ($request->has('sort')) {
            $services->setCollection(
                match ($request->get('sort')) {
                    'name' => $services->getCollection()->sortBy('name'),
                    'price1' => $services->getCollection()->sortBy('price'),
                    'price2' => $services->getCollection()->sortByDesc('price'),
                    'newest' => $services->getCollection()->sortByDesc('created_at'),
                    'oldest' => $services->getCollection()->sortBy('created_at'),
                    default => $services->getCollection(),
                }
            );
        }

        // Add parameters to ensure they are preserved when navigating between pages
        $services->appends($request->all());
        $html = view('Services.partials_services_list', compact('services'))->render();

        return response()->json(['html' => $html]);
    }

    public function showGallery()
    {
        $projects = Gallery::paginate(12);

        return view('Gallery.show_gallery', compact('projects'));
    }

}
