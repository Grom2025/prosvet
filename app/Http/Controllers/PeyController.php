<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PeyController extends Controller
{
    public function index()
    {

        return view('pey.index', [
            'datepickerTitle' => 'some text',
            'datepicker-title'=>"Select Date",
            'customMessage' => 'custom text',
            'picktime' => 'true',
            'pickdate' => 'true',
            'pickpast' => 'false',
            'mondayfirst' => 'true',
            'selecteddate' => now(),
            'updatefn'=>'ctrl.updateDate(newdate)',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pey.index', [
            'datepickerTitle' => 'some text',
            'customMessage' => 'custom text',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        return redirect('/');
    }
}
