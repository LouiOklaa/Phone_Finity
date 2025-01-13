<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\ServicesSections;
use Illuminate\Http\Request;

class ServicesSectionsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:DiensteKategorien|DienstKategorienHinzufügen|DienstKategorienBearbeite|DienstKategorienLöschen', ['only' => ['index']]);
        $this->middleware('permission:DienstKategorienHinzufügen', ['only' => ['store']]);
        $this->middleware('permission:DienstKategorienBearbeite', ['only' => ['update']]);
        $this->middleware('permission:DienstKategorienLöschen', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = ServicesSections::all();
        return view('Services.services_sections' , compact('sections'));
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

            'name' => 'required|unique:services_sections|max:255',

        ],[

            'name.required' =>'Bitte geben Sie die Kategorie name ein',
            'name.unique' =>'Die Kategorie name ist bereits registriert',

        ]);
        ServicesSections::create([

            'name' => $request->name,
            'note' => $request->note,

        ]);

        session()->flash('Add' , 'Die Kategorie wurde erfolgreich hinzugefügt');
        return redirect("/dienste_kategorien");
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicesSections $servicesSections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicesSections $servicesSections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|unique:services_sections,name,'.$id,

        ],[

            'name.required' =>'Bitte geben Sie die Kategorie name ein',
            'name.unique' =>'Die Kategorie name ist bereits registriert',

        ]);

        $sections = ServicesSections::find($id);
        $sections->update([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        Services::where('section_id', $id)->update([
            'section_name' => $request->name,
        ]);

        session()->flash('Edit','Die Kategorie wurde erfolgreich geändert');
        return redirect('/dienste_kategorien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        ServicesSections::find($id)->delete();

        session()->flash('Delete','Die Kategorie wurde erfolgreich gelöscht');
        return redirect('/dienste_kategorien');
    }
}
