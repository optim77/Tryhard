@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="h2 text-center mt-5 mb-5">Szukaj znajomych</p>
                <div class="">
                    <form class="form-inline d-flex justify-content-center" method="get" action="{{route('search')}}">
                        <input type="text" class="form-control w-75" name="search" id="search" placeholder="Wyszukaj znajomych">
                        <input type="submit" class="btn btn-primary" value="Szukaj">
                    </form>
                </div>
                @if(isset($users) && $users != null)
                    <p class="h2 text-center mt-5 mb-5">Wyniki wyszukiwania</p>
                    <div class="col-sm-12">
                        @foreach($users as $u)

                            <a class="text-dark" href="{{route('getUserProfile',[$u->firstName,$u->surname,$u->id])}}">
                                <div class="col-sm-4">
                                    <div class="card">
                                        <img class="w-100" src="https://static.pexels.com/photos/572937/pexels-photo-572937.jpeg">
                                        <div class="card-body h5">
                                            {{$u->firstName}} {{$u->surname}}
                                            <br>
                                            <button class="btn btn-primary mt-2">Dodaj</button>
                                        </div>

                                    </div>
                                </div>
                            </a>

                            @endforeach
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
                <p class="h2 text-center mt-5 mb-5">Proponowane osoby</p>
                <div class="row">

                    <div class="col-sm-4">
                        <div class="card">
                            <img class="w-100" src="https://static.pexels.com/photos/572937/pexels-photo-572937.jpeg">
                            <div class="card-body">Lorem ipsum</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <img class="w-100" src="https://static.pexels.com/photos/572937/pexels-photo-572937.jpeg">
                            <div class="card-body">Lorem ipsum</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <img class="w-100" src="https://static.pexels.com/photos/572937/pexels-photo-572937.jpeg">
                            <div class="card-body">Lorem ipsum</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @endsection