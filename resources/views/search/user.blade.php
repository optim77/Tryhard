@extends('master')
@section('content')
    <div class="container">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                        <img class="w-100" src="files/upload/{{$u->mainPhoto}}">
                                        <div class="card-body h5">
                                            {{$u->firstName}} {{$u->surname}}
                                            <br>
                                            <button id="invite" onclick="addToFriends({{$u->id}})" class="btn btn-primary mt-2">Dodaj</button>
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
                @if(isset($f2))
                @foreach($f2 as $f)

                    <a class="text-dark" href="{{route('getUserProfile',[$f->firstName,$f->surname,$f->id])}}">
                        <div class="col-sm-4">
                            <div class="card">
                                <img class="w-100" src="files/upload/{{$f->mainPhoto}}">
                                <div class="card-body h5">
                                    {{$f->firstName}} {{$f->surname}}
                                    <br>
                                    <button id="invite" onclick="addToFriends({{$f->id}})" class="btn btn-primary mt-2">Dodaj</button>
                                </div>

                            </div>
                        </div>
                    </a>

                    @endforeach
                @endif
                <div class="row">


                </div>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        function addToFriends(i) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('AJAXADDTOFRIENDS')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user='+ i,
                success: function () {
                    $("#invite").before('<div id="inviteAlert" class="alert alert-success mt-2">Wysłano zaproszenie do grona znajomych</div>').fadeOut('slow');
                    $("#inviteAlert").fadeOut('slow');
                }
            });
        }

    </script>

    @endsection