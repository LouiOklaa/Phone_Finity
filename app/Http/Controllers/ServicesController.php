<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\ServicesSections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:HandysDienste|HandysDiensteHinzufügen|HandysDiensteBearbeiten|HandysDiensteLöschen', ['only' => ['index']]);
        $this->middleware('permission:HandysDiensteHinzufügen', ['only' => ['store']]);
        $this->middleware('permission:HandysDiensteBearbeiten', ['only' => ['update']]);
        $this->middleware('permission:HandysDiensteLöschen', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = ServicesSections::all();
        $services = Services::paginate(10);
        return view('Services.services' , compact('sections' , 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([

            'name' => 'required',
            'section_id' => 'required',
            'price' => 'required',
            'image' => 'required',

        ],[

            'name.required' =>'Bitte geben Sie den Handynamen ein',
            'section_id.required' =>'Bitte wählen Sie die Kategorie aus',
            'price.required' =>'Bitte geben Sie den Preis an',
            'image.required' =>'Bitte geben Sie den Foto an',


        ]);

        $section_name = ServicesSections::where('id' , $request->section_id)->first()->name;

        $img = $request->file('image');
        $file_name = rand() . '.' . $img->getClientOriginalExtension();

        Services::create([

            'name' => $request->name,
            'section_id' => $request->section_id,
            'section_name' => $section_name,
            'price' => $request->price,
            'note' => $request->note,
            'image' => $file_name,
            'created_by' => auth()->id(),

        ]);

        // Move Files
        $request->image->move(public_path('Attachments/Services'), $file_name);

        session()->flash('Add' , 'Das Dienstleistungen wurde erfolgreich hinzugefügt');
        return redirect('/dienstleistungen');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request, [

            'section_name' => 'required',
            'price' => 'required',
        ], [


            'section_name.required' => 'Bitte wählen Sie die Kategorie aus',
            'price.required' => 'Bitte geben Sie den Preis ein',

        ]);

        $id = ServicesSections::where('name' , $request->section_name)->first()->id;
        $section_name = ServicesSections::where('name' , $request->section_name)->first()->name;


        $services = Services::findOrFail($request->id);

        $services->update([
            'name' => $request->name,
            'section_id' => $id,
            'section_name' => $section_name,
            'price' => $request->price,
            'note' => $request->note,
        ]);

        if ($request->hasFile('image')){

            Storage::disk('public_services')->delete($services->image);

            $img = $request->file('image');
            $file_name = rand() . '.' . $img->getClientOriginalExtension();
            $services->image = $file_name;
            $services->save();

            // Move File
            $request->image->move(public_path('Attachments/Services'), $file_name);
        }

        session()->flash('Edit','Des Dienstleistungen wurde erfolgreich geändert');
        return redirect('/dienstleistungen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $image = Services::where('id' , $request->id)->first()->image;
        $services = Services::findOrFail($request->id);
        $services->delete();

        Storage::disk('public_services')->delete($image);

        session()->flash('Delete','Das Dienstleistungen wurde erfolgreich gelöscht');
        return back();
    }
}
