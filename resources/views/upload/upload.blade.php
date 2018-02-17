@extends('master')
@section('content')


    @include('components.topBar')

    <div class="container">
        <p class="text-center h3 mt-5 mb-5">Wgraj zdjęcie</p>
        <form class="form-horizontal" action="" method="post">
            <label for="file">Wybierz plik:</label>
            <input id="file" name="file" type="file" class="form-control">
            <input type="submit" class="btn btn-primary m-3" value="Wyślij">
        </form>
    </div>

    @endsection