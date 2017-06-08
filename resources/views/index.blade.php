@extends("layouts.master")
@section("title","Accueil")


@section("content")
    <div class="col-12">
        <h1>Mon super site</h1>
        @foreach($songs as $song)
            @if(isset($song->images))
            <img src="{{$song->images->url}}" />
            @endif
            <a href="/song/{{$song->id}}">{{$song->titre}}</a> uploadé par {{$song->user->name}} <br/>
        @endforeach
        {{ $songs->links() }}
    </div>
@endsection
