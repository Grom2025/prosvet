<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\cicleDates;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Mail;
use Illuminate\Support\Facades\DB;

class cicleDateController extends Controller
{
    public function create()
    {

        return view('contact-form');
    }

    public function store(Request $request, string $mclientTime = '')
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'mobile_number' => ['required'],
            'fdate' => ['required'],

        ]);

        $newDate = Carbon::createFromFormat('d.m.Y', $request->fdate)
            ->format('Y-m-d');

        $cd = cicleDates::query()->where('fdate', '=', $newDate)->limit(1)->get();
        $properties = $cd->toArray();
        if ($properties) {
            for ($i = 0; $i < 24; $i++) {
                if ($properties[0]['f' . $i] and (($i >= $request->nach) and ($i <= $request->con))) {
                    return Response()->json(['success' => ':!:К сожалению на это время уже записались!']);
                }
            }
        }

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->mobile_number = $request->mobile_number;
        $contact->message = $request->message;
        $contact->begin = $request->nach;
        $contact->end = $request->con;
        $contact->fdate = $newDate;

        $contact->save();

        for ($i = 0; $i < 24; $i++) {
            if (($i >= $request->nach) and ($i <= $request->con)) {
                $mclientTime[$i] = '1';
            } else {
                $mclientTime[$i] = '0';
            }
            if ($properties)
                if ($properties[0]['f' . $i]) $mclientTime[$i] = '1';
        }

        if ($properties) {

            cicleDates::query()->update([
                'f0' => $mclientTime[0],
                'f1' => $mclientTime[1],
                'f2' => $mclientTime[2],
                'f3' => $mclientTime[3],
                'f4' => $mclientTime[4],
                'f5' => $mclientTime[5],
                'f6' => $mclientTime[6],
                'f7' => $mclientTime[7],
                'f8' => $mclientTime[8],
                'f9' => $mclientTime[9],
                'f10' => $mclientTime[10],
                'f11' => $mclientTime[11],
                'f12' => $mclientTime[12],
                'f13' => $mclientTime[13],
                'f14' => $mclientTime[14],
                'f15' => $mclientTime[15],
                'f16' => $mclientTime[16],
                'f17' => $mclientTime[17],
                'f18' => $mclientTime[18],
                'f19' => $mclientTime[19],
                'f20' => $mclientTime[20],
                'f21' => $mclientTime[21],
                'f22' => $mclientTime[22],
                'f23' => $mclientTime[23],

            ]);
        } else {
            $cd = new cicleDates;
            $cd->fdate = $newDate;
            $cd->f0 = $mclientTime[0];
            $cd->f1 = $mclientTime[1];
            $cd->f2 = $mclientTime[2];
            $cd->f3 = $mclientTime[3];
            $cd->f4 = $mclientTime[4];
            $cd->f5 = $mclientTime[5];
            $cd->f6 = $mclientTime[6];
            $cd->f7 = $mclientTime[7];
            $cd->f8 = $mclientTime[8];
            $cd->f9 = $mclientTime[9];
            $cd->f10 = $mclientTime[10];
            $cd->f11 = $mclientTime[11];
            $cd->f12 = $mclientTime[12];
            $cd->f13 = $mclientTime[13];
            $cd->f14 = $mclientTime[14];
            $cd->f15 = $mclientTime[15];
            $cd->f16 = $mclientTime[16];
            $cd->f17 = $mclientTime[17];
            $cd->f18 = $mclientTime[18];
            $cd->f19 = $mclientTime[19];
            $cd->f20 = $mclientTime[20];
            $cd->f21 = $mclientTime[21];
            $cd->f22 = $mclientTime[22];
            $cd->f23 = $mclientTime[23];
            $cd->save();
        }

        $mailData = [
            'title' => 'ProSvet',
            'body' => 'Вы успешно зарезервировали циклораму на ' . $request->fdate . ' число с ' . $request->nach . ' по ' . $request->con . ' часов.'
        ];

        $mailData2 = [
            'title' => 'ProSvet',
            'body' => 'Клиент ' . $request->name . ' tel: ' . $request->mobile_number . ' e-mail ' . $request->email . ' на ' . $request->fdate . ' число с ' . $request->nach . ' по ' . $request->con . ' часов.'
        ];
        if(!env('APP_DEBUG', false)){
            Mail::to('pravdaprosvet@yandex.ru')->send(new HelloMail($mailData2));
        }


        Mail::to($request->email)->send(new HelloMail($mailData));

        return Response()->json(['success' => ' Вы успешно забронировали часы с ' . $request->nach . ' по ' . $request->con . ' на ' . $request->fdate]);

    }

    public function return_dates(Request $request)
    {

        $newDate = Carbon::createFromFormat('d.m.Y', $request->fdate)
            ->format('Y-m-d');

        $cd = cicleDates::query()->where('fdate', '=', $newDate)->limit(1)->get();

        return response()->json(['success' => $cd]);


    }
}
