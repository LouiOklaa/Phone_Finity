<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        //Send Email
        Mail::to('info@oplas-bau.de')->send(new ContactMail($request->all()));

        return response()->json(['success' => 'Ihre Anfrage wurde erfolgreich gesendet. Dankeschön!']);
    }
}
