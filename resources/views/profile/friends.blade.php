@extends('master')

@include('components.topBar')

@section('content')

    <div class="container">
        <p class="text-center h4 m-5">Znajomi</p>
        <div class="row">
            @foreach($friends as $f)

                <div class="card col-sm text-center m-3">
                    <div class="card-body">
                        <a class="text-dark" href="{{route('getUserProfile',[$f->firstName,$f->surname,$f->id])}}">
                        <img class="img-responsive w-25 card-img" src="https://static.pexels.com/photos/572937/pexels-photo-572937.jpeg">
                        <p class="card-text">{{$f->firstName}}  {{$f->surname}}</p>
                        </a>
                    </div>
                </div>

                @endforeach
        </div>
    </div>

    @endsection