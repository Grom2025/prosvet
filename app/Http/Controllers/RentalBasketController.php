<?php

namespace App\Http\Controllers;

use App\Mail\HelloMail;
use App\Models\Rental;
use App\Models\rental_basket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class RentalBasketController extends Controller
{
    public function index()
    {
        $value = Cookie::get('otkn');
        if(!$value)$value=session('_token');
//            $r1 = Rental::all();
//            $b1 = DB::select("select * from rental_baskets, rentals where rental_baskets.token = \"?\" group by rental_baskets.rental_id",[session('_token')]);
        $b1 = DB::table('rental_baskets')
        ->join('rentals', 'rental_baskets.rental_id','=','rentals.id')
            ->select('rental_baskets.id','rentals.name', 'rental_baskets.token', 'rental_baskets.user_id', 'rentals.price','rental_baskets.rental_id')
            ->where('rental_baskets.token', '=', $value)
            //->groupBy('rental_baskets.rental_id','rental_baskets.user_id')
            ->get();
        //dd($b1);
        return view('basket.index', ['b1'=>$b1,]);
    }

    public function get_basket(Request $request)
    {
        $value = Cookie::get('otkn');
        if(!$value)$value=$request['token'];
        $b1 = DB::table('rental_baskets')
            ->join('rentals', 'rental_baskets.rental_id','=','rentals.id')
            ->select('rental_baskets.id','rentals.name', 'rental_baskets.token', 'rental_baskets.user_id', 'rentals.price','rental_baskets.rental_id')
            ->where('rental_baskets.token', '=',  $value)
            //->groupBy('rental_baskets.rental_id','rental_baskets.user_id')
            ->get();
        $ret=array();
        foreach ($b1 as $b){
            $ret[] = array($b->rental_id.'|||'.$b->name.'|||'.$b->price);
        }
        return response()->json(['success' => $ret]);
    }

    public function add_to_basket(Request $request)
    {
        $r1 = Rental::query()->findOrFail($request['id']);

        $value = Cookie::get('otkn');
        if(!$value)$value=$request['token'];
        rental_basket::create([
            'token'=>$value,
            'rental_id'=>$request['id'],
        ]);
        return response()->json(['success' => $r1['id'].'|||'.$r1['name'].'|||'.$r1['price']]);
    }

    public function set_basket_user(Request $request)
    {
        //$r1 = Rental::query()->findOrFail($request['id']);
        $value = Cookie::get('otkn');
        if(!$value)$value=$request['token'];
        rental_basket::where('token',$value)->update([
            'user_id'=>$request['user_id'],
            'fcount'=>'1',
            'token'=>'',
        ]);

        $zelezo = explode(',',$request['mymessage']);
        $body_text='Вы успешно зарезеpвировали оборудование ';
        $spisok='';
        foreach($zelezo as $zel){
            $spisok = $spisok.'<br>'.$zel;
        }
        $mailData = [
            'title' => 'ProSvet',
            'body' => $body_text.'<br>'.$spisok,
        ];


        $user = User::findOrFail($request['user_id']);

        $body_text2='Клиент  '.$user->name.' '.$user->email.' заказал ';
        $mailData2 = [
            'title' => 'ProSvet',
            'body' => $body_text2.'<br>'.$spisok,
        ];

        if(!env('APP_DEBUG', false)) {
            Mail::to('pravdaprosvet@yandex.ru')->send(new HelloMail($mailData2));
        }

        Mail::to($user->email)->send(new HelloMail($mailData));
        return response()->json(['success' => 'OK ']);
    }

    public function remove_from_basket(Request $request){
        $value = Cookie::get('otkn');
        if(!$value)$value=$request['token'];

        $b1 = rental_basket::query()->where('rental_id', $request['id'])->where('token',$value)->first();
        if($b1) {
            $b1->delete();
            return response()->json(['success' => 'OK']);
        }else{return response()->json(['success' => '!OK']);}


    }

}
