@extends('master')


@section('content')

    <div class="container">
        <p class="text-center h4 m-5">Znajomi</p>
        <div class="row">
            @foreach($friends as $f)

                <div class="card col-sm text-center m-3">
                    <div class="card-body">
                        <a class="text-dark" href="{{route('getUserProfile',[$f->firstName,$f->surname,$f->id])}}">
                        <img class="img-responsive w-50 card-img" src="files/upload/{{$f->mainPhoto}}">
                        <p class="card-text h4">{{$f->firstName}}  {{$f->surname}}</p>
                        </a>
                    </div>
                </div>

                @endforeach
        </div>
    </div>

    @endsection