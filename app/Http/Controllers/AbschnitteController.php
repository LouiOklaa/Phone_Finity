<?php

namespace App\Http\Controllers;

use App\Models\abschnitte;
use App\Models\handys;
use Illuminate\Http\Request;

class AbschnitteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:GeräteKategorien|GeräteKategorienHinzufügen|GeräteKategorienBearbeiten|GeräteKategorienLöschen', ['only' => ['index']]);
        $this->middleware('permission:GeräteKategorienHinzufügen', ['only' => ['store']]);
        $this->middleware('permission:GeräteKategorienBearbeiten', ['only' => ['update']]);
        $this->middleware('permission:GeräteKategorienLöschen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abschnitte = abschnitte::paginate(10);
        return view('Handys.abschnitte' , compact('abschnitte'));
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

            'name' => 'required|unique:abschnittes|max:255',

        ],[

            'name.required' =>'Bitte geben Sie die Kategorie name ein',
            'name.unique' =>'Die Kategorie name ist bereits registriert',

        ]);
        abschnitte::create([

            'name' => $request->name,
            'note' => $request->note,

        ]);

        session()->flash('Add' , 'Die Kategorie wurde erfolgreich hinzugefügt');
        return redirect("/handys_kategorien");
    }

    /**
     * Display the specified resource.
     */
    public function show(abschnitte $abschnitte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(abschnitte $abschnitte)
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

            'name' => 'required|max:255|unique:abschnittes,name,'.$id,

        ],[

            'name.required' =>'Bitte geben Sie die Kategorie name ein',
            'name.unique' =>'Die Kategorie name ist bereits registriert',

        ]);

        $abschnitte = abschnitte::find($id);
        $abschnitte->update([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        handys::where('section_id', $id)->update([
            'section_name' => $request->name,
        ]);

        session()->flash('Edit','Die Kategorie wurde erfolgreich geändert');
        return redirect('/handys_kategorien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        abschnitte::find($id)->delete();

        session()->flash('Delete','Die Kategorie wurde erfolgreich gelöscht');
        return redirect('/handys_kategorien');
    }
}
