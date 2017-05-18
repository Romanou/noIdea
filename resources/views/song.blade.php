@extends('layouts.master')

@section('title','Liste des sons')

@section('content')
    <h1>La page de la chanson {{$song->titre}}</h1>

    @if(sizeof($song->comments) > 0)
        <h4>Les commentaires</h4>
        @foreach($song->comments as $comment)
            Le {{$comment->created_at}}, {{$comment->user->name}} à écrit {{$comment->texte}}
        @endforeach
    @endif

    @if(Auth::check())
        @include('error')
        <form action="/comment/store/{{$song->id}}" method="post">
            {{ csrf_field()  }}
            <textarea name="commentaire" required></textarea>
            <input type="submit"/>
        </form>
    @endif

@endsection