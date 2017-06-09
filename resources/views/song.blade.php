@extends('layouts.master')

@section('title','Liste des sons')

@section('content')
    <div id="song" class="col-12">
        <h3>{{$song->titre}}</h3>

        <div class="contain_song">
            @if(isset($song->images))
                <img src="{{$song->images->url}}" />
            @endif
            <audio controls="" preload="none">
                <source src="{{$song->url}}">
                Votre navigateur n'est pas compatible
            </audio>
        </div>

        <div class="comments">
            @if($song->comments->count()>0)
                <h4>Les commentaires</h4>
                @foreach($song->comments as $comment)
                    <div class="comment">
                        <div class="user">
                            {{$comment->user->name}}
                        </div>
                        <div class="content">
                            {{$comment->texte}}
                        </div>
                        <div class="date">
                            Le {{$comment->created_at->format('d/m/Y à H\hi')}}
                        </div>
                        @if($comment->created_at->format('d/m/Y à H\hi') != $comment->updated_at->format('d/m/Y à H\hi'))
                            Modifiée le {{$comment->updated_at->format('d/m/Y à H\hi')}}
                        @endif
                    </div>
                @endforeach
            @else
                <h4>Il n'y a pas encore de commentaires ...</h4>
            @endif
        </div>

        @if(Auth::check())
            <div class="comment_form">
                <h4>Poster votre commentaire</h4>
                @include('error')
                <form action="/comment/store/{{$song->id}}" method="post">
                    {{ csrf_field()  }}
                    <textarea name="commentaire" required></textarea>
                    <button type="submit"><span>Poster</span></button>
                </form>
            </div>
        @endif
    </div>
@endsection