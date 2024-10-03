<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $information = GeneralInformation::findOrFail($request->id);
        $information->update([
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
            'address_link' => $request->address_link,
            'facebook_link' => $request->facebook_link,
            'instagram_link' => $request->instagram_link,
            'tiktok_link' => $request->tiktok_link,
        ]);

        if ($request->hasFile('img1')){

            Storage::disk('public_home-page')->delete($information->img1);

            $img1 = $request->file('img1');
            $file_name1 = rand() . '.' . $img1->getClientOriginalExtension();
            $information->img1 = $file_name1;
            $information->save();

            // Move File
            $request->img1->move(public_path('Attachments/Home_Page'), $file_name1);
        }

        if ($request->hasFile('img2')){

            Storage::disk('public_home-page')->delete($information->img2);

            $img2 = $request->file('img2');
            $file_name2 = rand() . '.' . $img2->getClientOriginalExtension();
            $information->img2 = $file_name2;
            $information->save();

            // Move File
            $request->img2->move(public_path('Attachments/Home_Page'), $file_name2);
        }

        if ($request->hasFile('img3')){

            Storage::disk('public_home-page')->delete($information->img3);

            $img3 = $request->file('img3');
            $file_name3 = rand() . '.' . $img3->getClientOriginalExtension();
            $information->img3 = $file_name3;
            $information->save();

            // Move File
            $request->img3->move(public_path('Attachments/Home_Page'), $file_name3);
        }

        if ($request->hasFile('img4')){

            Storage::disk('public_home-page')->delete($information->img4);

            $img4 = $request->file('img4');
            $file_name4 = rand() . '.' . $img4->getClientOriginalExtension();
            $information->img4 = $file_name4;
            $information->save();

            // Move File
            $request->img4->move(public_path('Attachments/Home_Page'), $file_name4);
        }


        session()->flash('Edit','Die Informationen wurden erfolgreich geändert');
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
