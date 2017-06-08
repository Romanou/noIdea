@extends('layouts.master')

@section('title','Liste des sons')

@section('content')
    <div class="col-12">
        <h1>La page de la chanson {{$song->titre}}</h1>

        <audio controls="" preload="none">
            <source src="{{$song->url}}">
            Votre navigateur n'est pas compatible
        </audio>

        @if($song->comments->count()>0)
            <h4>Les commentaires</h4>
            @foreach($song->comments as $comment)
                Le {{$comment->created_at->format('d/m/Y à H\hi')}} par {{$comment->user->name}} : {{$comment->texte}},
                @if($comment->created_at->format('d/m/Y à H\hi') != $comment->updated_at->format('d/m/Y à H\hi'))
                Modifiée le {{$comment->updated_at->format('d/m/Y à H\hi')}}
                @endif
            @endforeach
        @else
            <h4>Il n'y a pas encore de commentaires ...</h4>
        @endif

        @if(Auth::check())
            @include('error')
            <form action="/comment/store/{{$song->id}}" method="post">
                {{ csrf_field()  }}
                <textarea name="commentaire" required></textarea>
                <input type="submit"/>
            </form>
        @endif
    </div>
@endsection