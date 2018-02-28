@extends('master')
@section('content')

    <div class="container">

        <div class="row mt-5">

            @foreach($visitors as $v)

                <a class="text-dark" href="{{route('getUserProfile',[$v->firstName,$v->surname,$v->id])}}">
                    <div class="col-sm-4">
                        <div class="card">
                            <img class="w-100" src="https://static.pexels.com/photos/572937/pexels-photo-572937.jpeg">
                            <div class="card-body h5 text-center">
                                {{$v->firstName}} {{$v->surname}}
                                <br>
                            </div>

                        </div>
                    </div>
                </a>



                @endforeach

        </div>

    </div>

    @endsection