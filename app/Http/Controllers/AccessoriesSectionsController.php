<?php

namespace App\Http\Controllers;

use App\Models\accessories_sections;
use Illuminate\Http\Request;

class AccessoriesSectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = accessories_sections::all();
        return view('Accessories.accessories_sections' , compact('sections'));
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

            'name' => 'required|unique:accessories_sections|max:255',

        ],[

            'name.required' =>'Bitte geben Sie den Abschnitt name ein',
            'name.unique' =>'Der Abschnitt name ist bereits registriert',

        ]);
        accessories_sections::create([

            'name' => $request->name,
            'note' => $request->note,

        ]);

        session()->flash('Add' , 'Der Abschnitt wurde erfolgreich hinzugefügt');
        return redirect("/zubehör_kategorien");
    }

    /**
     * Display the specified resource.
     */
    public function show(accessories_sections $accessories_Sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(accessories_sections $accessories_Sections)
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

            'name' => 'required|max:255|unique:accessories_sections,name,'.$id,

        ],[

            'name.required' =>'Bitte geben Sie den abschnitt name ein',
            'name.unique' =>'Der abschnitt name ist bereits registriert',

        ]);

        $sections = accessories_sections::find($id);
        $sections->update([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        session()->flash('Edit','Der Abschnitt wurde erflogreich geändert');
        return redirect('/zubehör_kategorien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        accessories_sections::find($id)->delete();

        session()->flash('Delete','Der Abschnitt wurde erflogreich gelöscht');
        return redirect('/zubehör_kategorien');
    }
}
