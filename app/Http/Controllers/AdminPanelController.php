<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Traits\Upload;
use DefStudio\Telegraph\Facades\Telegraph;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DefStudio\Telegraph\Models\TelegraphChat;

class AdminPanelController extends Controller
{
    use Upload;


    public function index()
    {
        $posts = Post::query()->latest()->paginate(3);
        return view('adm.index', ['posts' => $posts,]);
    }
    public function show_users()
    {

        $users = User::query()->latest()->paginate(25);
        return view('adm.show_users', ['users'=>$users]);
    }

    public function send_msg(){
        /** @var TelegraphChat $chat */
        $chat = TelegraphChat::find();
        $chat->html("<strong>Hello!</strong>\n\nI'm here!")->send();
        Telegraph::botInfo()->send();
        //Telegraph::chatAction(ChatActions::TYPING)->send();


    }

    public function create()
    {
       return view('adm.create_post');
    }

    public function edit(string $id)
    {
        $posts = Post::query()->findOrFail($id);
        return view('adm.edit_post', ['posts' => $posts]);
    }

    public function edit_news_pic(string $id)
    {
        $posts = Post::query()->findOrFail($id);
        return view('adm.edit_news_pic', ['posts' => $posts]);
    }

    public function update(Request $request, Post $post)
    {
        $path = '';
        if ($request->hasFile('test')) {
            $path = $this->UploadFile($request->file('test'), 'news');
        }

        $post = Post::query()->findOrFail($request['fid']);

        $post->update([
            'employer_id' => '1',
            'title' => $request['title'],
            'ftext' => $request['ftext'],
            'fdate' => $request['fdate'],
            'featured' => '0',
        ]);
        if($path)
            $post->update(['url' => $path,]);

        return redirect(url('/adm'));
    }

    public function update_news_pic(Request $request, Post $post)
    {
//        dd($request);
        $path = '';
        if ($request->hasFile('test')) {
            $path = $this->UploadFile($request->file('test'), 'news');
        }
        $post = Post::query()->findOrFail($request['fid']);
        $post->update(['url' => $path,]);

        return redirect(url('/adm'));
    }

    public function create_user(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['pass'],
            ]);
        return redirect(url('/adm'));
    }

    public function store(Request $request)
    {
        $path = '';

        if ($request->hasFile('test')) {
            $path = $this->UploadFile($request->file('test'), 'news');
        }

        Post::updateOrCreate([
            'employer_id' => '1',
            'title' => $request['title'],
            'ftext' => $request['ftext'],
            'fdate' => $request['fdate'],
            'featured' => '0',
            'url' => $path,
        ]);
        return redirect(url('/adm'));

    }


}
