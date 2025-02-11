<?php

namespace App\Http\Controllers;

use App\Exports\ExportExcel;
use App\Models\abschnitte;
use App\Models\Accessories;
use App\Models\accessories_sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AccessoriesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:HandysZubehör|HandysZubehörHinzufügen|HandysZubehörBearbeiten|HandysZubehörLöschen', ['only' => ['index']]);
        $this->middleware('permission:HandysZubehörHinzufügen', ['only' => ['store']]);
        $this->middleware('permission:HandysZubehörBearbeiten', ['only' => ['update']]);
        $this->middleware('permission:HandysZubehörLöschen', ['only' => ['destroy']]);
        $this->middleware('permission:ExportExcel', ['only' => ['AccessoriesExport']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = accessories_sections::all();
        $brand = abschnitte::pluck('name');
        $accessories = accessories::paginate(10);
        return view('Accessories.accessories', compact('sections', 'accessories', 'brand'));
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

        $validatedData = $request->validate([

            'name' => 'required',
            'section_id' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'image' => 'required',

        ], [

            'name.required' => 'Bitte geben Sie den Handynamen ein',
            'section_id.required' => 'Bitte wählen Sie die Kategorie aus',
            'price.required' => 'Bitte geben Sie den Preis an',
            'brand.required' => 'Bitte geben Sie den Marke an',
            'image.required' => 'Bitte geben Sie den Foto an',


        ]);

        $section_name = accessories_sections::where('id', $request->section_id)->first()->name;

        $img = $request->file('image');
        $file_name = rand() . '.' . $img->getClientOriginalExtension();

        accessories::create([

            'name' => $request->name,
            'section_id' => $request->section_id,
            'section_name' => $section_name,
            'brand' => $request->brand,
            'price' => $request->price,
            'note' => $request->note,
            'image' => $file_name,
            'created_by' => auth()->id(),

        ]);

        // Move Files
        $request->image->move(public_path('Attachments/Accessories'), $file_name);

        session()->flash('Add', 'Das Produkt wurde erfolgreich hinzugefügt');
        return redirect('/zubehör');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accessories $accessories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accessories $accessories)
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

        $id = accessories_sections::where('name', $request->section_name)->first()->id;
        $section_name = accessories_sections::where('name', $request->section_name)->first()->name;


        $accessories = accessories::findOrFail($request->id);

        $accessories->update([
            'name' => $request->name,
            'section_id' => $id,
            'section_name' => $section_name,
            'brand' => $request->brand,
            'price' => $request->price,
            'note' => $request->note,
        ]);

        if ($request->hasFile('image')) {

            Storage::disk('public_accessories')->delete($accessories->image);

            $img = $request->file('image');
            $file_name = rand() . '.' . $img->getClientOriginalExtension();
            $accessories->image = $file_name;
            $accessories->save();

            // Move File
            $request->image->move(public_path('Attachments/Accessories'), $file_name);
        }

        session()->flash('Edit', 'Des Produkt wurde erfolgreich geändert');
        return redirect('/zubehör');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $image = accessories::where('id', $request->id)->first()->image;
        $accessories = accessories::findOrFail($request->id);
        $accessories->delete();

        Storage::disk('public_accessories')->delete($image);

        session()->flash('Delete', 'Das Produkt wurde erfolgreich gelöscht');
        return back();

    }

    public function AccessoriesExport($PageId)
    {
        return Excel::download(new ExportExcel($PageId), 'Zubehör.xlsx');
    }
}
