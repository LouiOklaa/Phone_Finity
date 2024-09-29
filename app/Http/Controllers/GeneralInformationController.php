<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use Illuminate\Http\Request;

class GeneralInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = GeneralInformation::first();
        return view('General_Information.general_information' , compact('information'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralInformation $generalInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralInformation $generalInformation)
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

            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required',
            'address_link' => 'required',
            'facebook_link' => 'required',
            'instagram_link' => 'required',
            'tiktok_link' => 'required',

        ],[

            'phone_number.required' => 'Bitte geben Sie den Handynummer ein',
            'address.required' => 'Bitte geben Sie die Adresse ein',
            'email.required' => 'Bitte geben Sie die E-Mail ein',
            'address_link.required' => 'Bitte geben Sie den Adresselink ein',
            'facebook_link.required' => 'Bitte geben Sie den Facebook Link ein',
            'instagram_link.required' => 'Bitte geben Sie den Instagram Link ein',
            'tiktok_link.required' => 'Bitte geben Sie den TikTik Link ein',

        ]);

        $information = GeneralInformation::find($id);
        $information->update([
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
            'address_link' => $request->address_link,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'tiktok_link' => $request->tiktok_link,
        ]);

        session()->flash('edit','Die Informationen wurden erfolgreich geändert');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralInformation $generalInformation)
    {
        //
    }
}
