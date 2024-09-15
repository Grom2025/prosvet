<?php

namespace App\Http\Controllers;

use App\Models\cicleDates;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    use Upload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $cd = cicleDates::query()->get();
//        $properties = $cd->toArray();
//        $properties1='';
//        for($i=0;$i<24;$i++){
//            $properties1= $properties1. $properties[0]['f'.$i];
//        }
//
//        dd($properties1);

        $posts = Post::query()->paginate(3);

        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],

        ]);
        $request->validate([
            'test' => 'required',
        ]);

        $path='';

        if ($request->hasFile('test')) {
            $path = $this->UploadFile($request->file('test'), 'news');
        }

        $attributes['featured'] = $request->has('featured');

        $post = Post::create(Arr::except($attributes, 'tags'));

        $post->update(['url'=>$path]);

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $post->tag($tag);
            }
        }

        return redirect('/');

    }
}
