@extends("layouts.master")

@section("title","Nouveau son")

@section("content")
    <form method="post" action="/song/store" enctype="multipart/form-data">

        {{csrf_field()}}
        <input type="text" name="title" required placeholder="Le titre"/><br/>
        <input type="file" name="song" required/><br/>
        <input type="submit"/>
    </form>
@endsection