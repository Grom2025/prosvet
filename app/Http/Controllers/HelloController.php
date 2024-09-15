<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use Mail;
use Illuminate\Http\Request;


class HelloController extends Controller
{
    //
    public function sendHelloMail()
    {
        $mailData = [
            'title' => 'ProSvet',
            'body' => 'Вы успешно зарезервировали циклораму на  число с  по  часов.'
        ];


        Mail::to('grom2025@gmail.com')->send(new HelloMail($mailData));

        return "Email has been sent successfully!";
    }
}
