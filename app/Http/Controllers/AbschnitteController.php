<?php

namespace App\Http\Controllers;

use App\Models\abschnitte;
use Illuminate\Http\Request;

class AbschnitteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abschnitte = abschnitte::all();
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

            'name.required' =>'Bitte geben Sie den Abschnitt name ein',
            'name.unique' =>'Der Abschnitt name ist bereits registriert',

        ]);
        abschnitte::create([

            'name' => $request->name,
            'note' => $request->note,

        ]);

        session()->flash('Add' , 'Der Abschnitt wurde erfolgreich hinzugefügt');
        return redirect("/abschnitte");
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

            'name.required' =>'Bitte geben Sie den abschnitt name ein',
            'name.unique' =>'Der abschnitt name ist bereits registriert',

        ]);

        $abschnitte = abschnitte::find($id);
        $abschnitte->update([
            'name' => $request->name,
            'note' => $request->note,
        ]);

        session()->flash('Edit','Der Abschnitt wurde erflogreich geändert');
        return redirect('/abschnitte');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        abschnitte::find($id)->delete();

        session()->flash('Delete','Der Abschnitt wurde erflogreich gelöscht');
        return redirect('/abschnitte');
    }
}
