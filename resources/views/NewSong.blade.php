@extends("layouts.master")

@section("title","Nouveau son")

@section("content")
    <div id="new_song" class="col-12">
        <div class="container">
            <div class="form_box col-8 prepend-2">
                <form method="post" action="/song/store" enctype="multipart/form-data">
                    <h3>Mettez en ligne votre propre son</h3>
                    @if(isset($error))
                        {{$error}}
                    @endif
                    {{csrf_field()}}
                    <label for="title">Titre de la musique</label>
                    <input type="text" name="title" required min=5 max=60/>
                    <label for="song">Son </label><input type="file" name="song" id="song" required/>
                    <label for="illustration">Illustration </label><input type="file" name="illustration" id="illustration" required/>
                    <button type="submit"><span>Valider</span></button>
                </form>
            </div>
        </div>
    </div>
@endsection