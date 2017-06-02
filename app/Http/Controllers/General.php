<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Song;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class General extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('index',['songs'=>$songs]);
    }

    public function song($id)
    {
        $song = Song::find($id);
        return view('song',['song'=>$song]);
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('user',['user'=>$user]);
    }

    public function StoreComment(Request $request,$id)
    {

        $this->validate($request,[
            'commentaire' => 'required|min:2'
        ]);

        $c = new Comment();
        $c->texte = $request->input('commentaire');
        $c->user_id = Auth::id();
        $c->song_id = $id;
        $c->save();

        return back();
    }


    public function NewSong()
    {
        return view('NewSong');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function StoreSong(Request $request)
    {
        $this->validate($request,[
           'title'=>'required|min:2',
            'song'=>'required'
        ]);

        $file = $request->file("song");
        $s = new Song();
        $s->titre = $request->input('title');
        $url = Storage::url($file->store("song","public"));
        $s->url = $url;
        $s->user_id = Auth::id();
        $s->times = 0;
        $s->save();

        return redirect("/song/".$s->id);
    }

    public function search(Request $request)
    {
        $this->validate($request,[
            'item' => 'required|min:2',
        ]);

        $songs = Song::whereRaw("titre LIKE CONCAT('%',?,'%')",array($request->input('item')))
        ->orderBy('created_at','desc')
        ->get();

        return view('index',['songs'=>$songs]);
    }
}