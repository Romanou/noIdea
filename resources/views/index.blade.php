@extends("layouts.master")
@section("title","Accueil")


@section("content")
    <div class="col-12">
        <h1>Mon super site</h1>
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
        {{ $songs->links() }}
    </div>
@endsection
