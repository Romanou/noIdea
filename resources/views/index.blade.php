@extends("layouts.master")
@section("title","Accueil")

@section("content")
    <div class="col-12 last_songs">
        <h2>Les dernières musiques misent en ligne</h2>
        @if(sizeof($songs) > 0)
            @foreach($songs as $song)
                <div class="contain_song">
                    <a href="/song/{{$song->id}}">
                        @if(isset($song->images))
                            <img src="{{$song->images->url}}" />
                        @endif
                        <div class="title">{{$song->titre}} uploadé par {{$song->user->name}}</div>
                    </a>
                </div>
            @endforeach
        @else
            <h4>Il n'y a pas ecore de musiques ...</h4>
        @endif
        {{ $songs->links() }}
    </div>
@endsection
