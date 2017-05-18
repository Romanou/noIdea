@extends("layouts.master")

@section("title","Accueil")

@section("content")
    <h1>Mon super site</h1>
    @foreach($songs as $song)
        <a href="/song/{{$song->id}}">{{$song->titre}}</a> uploadé par {{$song->user->name}} <br/>
    @endforeach
@endsection