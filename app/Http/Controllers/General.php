<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Song;
use App\Image;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class General extends Controller
{
    public function index()
    {
        $songs = Song::paginate(15);
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
            'song'=>'required',
            'illustration'=>'required'
        ]);

        $song = $request->file("song");

        $extension_song = $song->getClientOriginalName();
        $extension_song = explode(".",$extension_song);
        $extension_song = end($extension_song);

        $illustration = $request->file("illustration");

        $extension_illustration = $illustration->getClientOriginalName();
        $extension_illustration = explode(".",$extension_illustration);
        $extension_illustration = end($extension_illustration);

        $return = null;
        if(strtoupper($extension_song) == "MP3" && strtoupper($extension_illustration) == "JPG"){
            $s = new Song();
            $s->titre = $request->input('title');
            $url = Storage::url($song->store("song","public"));
            $s->url = $url;
            $s->user_id = Auth::id();
            $s->times = 0;
            $s->save();

            $i = new Image();
            $i->song_id = $s->id;
            $url = Storage::url($illustration->store("illustration","public"));
            $i->url = $url;
            $i->save();
            $return = redirect("/song/".$s->id);
        }else{
            $return = view('NewSong',['error'=>"Nous n'acceptons que les fichiers .MP3 pour les sons et .JPG pour les illustrations !"]);
        }


        return $return;
    }

    public function search(Request $request)
    {
        $this->validate($request,[
            'term' => 'required|min:2',
        ]);

        $songs = Song::whereRaw("titre LIKE CONCAT('%',?,'%')",array($request->input('term')))
        ->orderBy('created_at','desc')->paginate(15);


        return view('index',['songs'=>$songs]);
    }
}