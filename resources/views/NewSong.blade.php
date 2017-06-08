@extends("layouts.master")

@section("title","Nouveau son")

@section("content")
    <div class="col-12">
        <form method="post" action="/song/store" enctype="multipart/form-data">
            @if(isset($error))
                {{$error}}
            @endif
            {{csrf_field()}}
            <input type="text" name="title" required placeholder="Le titre"/><br/>
                <label for="song">Son </label><input type="file" name="song" id="song" required/><br/>
                <label for="illustration">Illustration </label><input type="file" name="illustration" id="illustration" required/><br/>
            <input type="submit"/>
        </form>
    </div>
@endsection