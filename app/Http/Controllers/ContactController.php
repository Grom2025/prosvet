<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use http\Env\Response;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create() {

        return view('contact-form');
    }

    public function store(Request $request) {

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->mobile_number = $request->mobile_number;
        $contact->message = $request->message;
        $contact->fbegin = $request->nach;
        $contact->end = $request->con;
        $contact->fdate = $request->fdate;

        $contact->save();

        return Response()->json(['success'=>'Form is successfully submitted!'.$request->fdate]);

    }
}
