<?php

namespace App\Http\Controllers;

use App\Models\ServicesSections;
use Illuminate\Http\Request;

class ServicesSectionsController extends Controller
{
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

            'name.required' =>'Bitte geben Sie den Abschnitt name ein',
            'name.unique' =>'Der Abschnitt name ist bereits registriert',

        ]);
        ServicesSections::create([

            'name' => $request->name,
            'note' => $request->note,

        ]);

        session()->flash('Add' , 'Der Abschnitt wurde erfolgreich hinzugefügt');
        return redirect("/dienstleistungensbereich");
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

            'name.required' =>'Bitte geben Sie den abschnitt name ein',
            'name.unique' =>'Der abschnitt name ist bereits registriert',

        ]);

        $sections = ServicesSections::find($id);
        $sections->update([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        session()->flash('Edit','Der Abschnitt wurde erflogreich geändert');
        return redirect('/dienstleistungensbereich');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        ServicesSections::find($id)->delete();

        session()->flash('Delete','Der Abschnitt wurde erflogreich gelöscht');
        return redirect('/dienstleistungensbereich');
    }
}
