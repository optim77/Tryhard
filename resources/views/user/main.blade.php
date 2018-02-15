@extends('master')
@section('content')

    @include('components.topBar')

    <div class="container mt-5">
        <div class="row table-bordered p-3 radius">
            <div class="col-sm-3">
                <img class="img-responsive img-rounded w-100 card-img-top" src="https://static.pexels.com/photos/129459/pexels-photo-129459.jpeg">
            </div>
            <div class="col-sm-8">
             <p class="text-left align-text-bottom">Imie Nazwisko</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 btn-group mt-3">
                <button class="btn btn-primary w-100">Znajomi</button>
                <button class="btn btn-primary w-100">Zdjęcia</button>
                <button class="btn btn-primary w-100">Powiadomienia</button>
            </div>
        </div>

        <div class="row mt-3 d-flex text-center">
            <div class="col-sm-12">
                <img class="img-responsive img-rounded w-75 card-img-top" src="https://static.pexels.com/photos/129459/pexels-photo-129459.jpeg">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="btn-group">
                            <button class="btn btn-primary mt-2">Star</button>
                            <button class="btn mt-2">0</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection