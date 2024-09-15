<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
            'tel'=>['nullable'],
            'tg'=>['nullable'],
            'agreement'=>['accepted'],

        ],[
            'agreement'=>'Необходимо согласие',
            'tg'=>' need tg',
            'tel'=>'nullable',
            'password' => ' need pass',
            'email'=>'email',
            'name'=>'name',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
//        dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tel'=>$data['tel'],
            'tg'=>$data['tg'],
            'agreement'=>'true',
        ]);

        $mailData = [
            'title' => 'ProSvet',
            'body' => 'Вы успешно зарегистрировались на нашем сайте <br> Имя для входа: '.$data['email'],
        ];

        Mail::to($data['email'])->send(new HelloMail($mailData));
    }
}
