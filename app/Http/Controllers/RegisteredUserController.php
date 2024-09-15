<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(6)],
        ]);

        $user = User::create($userAttributes);

        $logoPath = $request->logo->store('logos');

        $user->employer()->create([
            'name' => $userAttributes['name'],
            'logo' => '$logoPath',
        ]);
        $mailData = [
            'title' => 'ProSvet',
            'body' => 'Вы успешно зарегистрировались на нашем сайте <br> Имя для входа: '.$userAttributes['email'],
        ];

        Mail::to($userAttributes['email'])->send(new HelloMail($mailData));

        Auth::login($user);

        return redirect('/');
    }
}
