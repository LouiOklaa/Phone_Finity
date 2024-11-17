<?php

namespace App\Http\Controllers;

use App\Models\abschnitte;
use App\Models\handys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class HandysController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Geräte|GerätHinzufügen|GerätBearbeiten|GerätLöschen', ['only' => ['index']]);
        $this->middleware('permission:GerätHinzufügen', ['only' => ['store']]);
        $this->middleware('permission:GerätBearbeiten', ['only' => ['update']]);
        $this->middleware('permission:GerätLöschen', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abschnitte = abschnitte::all();
        $handys = handys::all();
        return view('Handys.handys' , compact('abschnitte' , 'handys'));
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

            'name' => 'required|unique:handys',
            'section_id' => 'required',
            'status' => 'required',
            'preis' => 'required',
            'amount' => 'required',
            'image' => 'required',

        ],[

            'name.required' =>'Bitte geben Sie den Handynamen ein',
            'name.unique' =>'Dieses Handy existiert bereits',
            'section_id.required' =>'Bitte wählen Sie die Kategorie aus',
            'status.required' =>'Bitte wählen Sie den Zustand des Handy aus',
            'preis.required' =>'Bitte geben Sie den Handypreis an',
            'amount.required' =>'Bitte geben Sie den Menge an',
            'image.required' =>'Bitte geben Sie ein Handyfoto ein',

        ]);

        $section_name = abschnitte::where('id' , $request->section_id)->first()->name;

        $img = $request->file('image');
        $file_name = rand() . '.' . $img->getClientOriginalExtension();

        handys::create([

            'name' => $request->name,
            'section_id' => $request->section_id,
            'section_name' => $section_name,
            'status' => $request->status,
            'preis' => $request->preis,
            'amount' => $request->amount,
            'note' => $request->note,
            'image' => $file_name,
            'created_by' => auth()->id(),

        ]);

            // Move Files
            $request->image->move(public_path('Attachments/Handys'), $file_name);

        session()->flash('Add' , 'Das Handy wurde erfolgreich hinzugefügt');
        return redirect('/handys');
    }

    /**
     * Display the specified resource.
     */
    public function show(handys $handys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(handys $handys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = abschnitte::where('name' , $request->section_name)->first()->id;
        $section_name = abschnitte::where('name' , $request->section_name)->first()->name;


        $handy = handys::findOrFail($request->id);

        if ($handy->name == $request->name && $handy->section_id == $id ){

            $this->validate($request, [

                'name' => 'required',
                'section_name' => 'required',
                'preis' => 'required',
                'amount' => 'required',
            ], [

                'name.required' => 'Bitte geben Sie den Handynamen ein',
                'section_name.required' => 'Bitte geben Sie die Kategorie ein',
                'preis.required' => 'Bitte geben Sie den Preis ein',
                'amount.required' => 'Bitte geben Sie den Menge ein',

            ]);

            $handy->update([
                'name' => $request->name,
                'section_id' => $id,
                'section_name' => $section_name,
                'status' => $request->status,
                'preis' => $request->preis,
                'amount' => $request->amount,
                'note' => $request->note,
            ]);
            if ($request->hasFile('image')){

                Storage::disk('public_handys')->delete($handy->image);

                $img = $request->file('image');
                $file_name = rand() . '.' . $img->getClientOriginalExtension();
                $handy->image = $file_name;
                $handy->save();

                // Move File
                $request->image->move(public_path('Attachments/Handys'), $file_name);
            }
        }

        else {
            $this->validate($request, [

                'name' => ['required', Rule::unique('handys')
                    ->where(function ($query) use ($request , $id) {
                        return $query->where('name', $request->name)->where('section_id', $id);
                    })],
                'section_name' => 'required',
                'preis' => 'required',
                'amount' => 'required',
            ], [

                'name.required' => 'Bitte geben Sie den Handynamen ein',
                'name.unique' => 'Das Handynamen ist in diese Kategorie bereits vorhanded',
                'section_name.required' => 'Bitte wählen Sie den Handytyp aus',
                'preis.required' => 'Bitte geben Sie den Preis ein',
                'amount.required' => 'Bitte geben Sie den Menge ein',

            ]);

            $handy->update([
                'name' => $request->name,
                'section_id' => $id,
                'section_name' => $section_name,
                'status' => $request->status,
                'preis' => $request->preis,
                'amount' => $request->amount,
                'note' => $request->note,
            ]);
            if ($request->hasFile('image')){

                Storage::disk('public_handys')->delete($handy->image);

                $img = $request->file('image');
                $file_name = rand() . '.' . $img->getClientOriginalExtension();
                $handy->image = $file_name;
                $handy->save();

                // Move File
                $request->image->move(public_path('Attachments/Handys'), $file_name);
            }
        }

        session()->flash('Edit','Das Handy wurde erfolgreich geändert');
        return redirect('/handys');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $image = handys::where('id' , $request->id)->first()->image;

        handys::findOrFail($id)->delete();

        Storage::disk('public_handys')->delete($image);

        session()->flash('Delete','Das Handy wurde erfolgreich gelöscht');
        return redirect('/handys');
    }
}
