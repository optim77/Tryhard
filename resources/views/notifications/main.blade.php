@extends('master')

@section('content')

    @include('components.topBar')

    <div class="container mt-5">
        <div class="row">


        @foreach($notice as $n)
            <div class=" p-5 col-sm-12 text-center" style="border-top: solid 5px #007bff">
            @if($n->status == $n->user_id2)
                <a class="text-dark">
                    {{print_r($n->user_id2)}}
                    {{$n->user_id2}}
                </a>

                 chce dołączyć do grona twoich znajomych<br>
                <button class="btn btn-primary">Akceptuj</button>
                <button class="btn btn-danger">Usuń</button>
            @endif
            </div>
            @endforeach
        </div>
    </div>

    @endsection