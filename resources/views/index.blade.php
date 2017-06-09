@extends("layouts.master")
@section("title","Accueil")

@section("content")
    <div id="last_songs" class="col-12">
        <h2>Les dernières musiques misent en ligne</h2>
        @if(sizeof($songs) > 0)
            <?php $i = 0; ?>
            @foreach($songs as $song)
                @if(($i%2) === 0)
                <div class="contain_song left">
                @else
                <div class="contain_song right">
                @endif
                    <a href="/song/{{$song->id}}">
                        @if(isset($song->images))
                            <img src="{{$song->images->url}}" />
                        @endif
                        <div class="title">{{$song->titre}} uploadé par {{$song->user->name}}</div>
                    </a>
                </div>
                <?php $i++; ?>
            @endforeach
        @else
            <h4>Pas de musiques ...</h4>
        @endif
        {{ $songs->links() }}
    </div>
@endsection
