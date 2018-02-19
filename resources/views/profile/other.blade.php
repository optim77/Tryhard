@extends('master')
@section('content')

    @include('components.topBar')

    <div class="container mt-5">
        <div class="row table-bordered p-3 radius">
            <div class="col-sm-3">
                <img class="img-responsive img-rounded w-100 card-img-top" src="https://static.pexels.com/photos/129459/pexels-photo-129459.jpeg">
            </div>
            <div class="col-sm-9">
                <p class="text-left align-text-bottom"><i class="fas fa-user"></i>  {{$user->firstName}} {{$user->surname}}</p>
                <p class="text-left align-text-bottom"><i class="fas fa-user"></i>  Pseudonim</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-users"></i> 566</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-star"></i> 4123</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-eye"></i> 32221</p>
                <meta name="csrf-token" content="{{ csrf_token() }}">


                    @if($friends != null)
                        <button class="btn btn-danger col-sm-12" id="delete" onclick="deleteFromFriends({{$user->id}})" >Usuń ze znajomych</button>
                    @else
                        <button class="btn btn-primary col-sm-12" id="invite" onclick="addToFriends({{$user->id}})" >Zaproś do znajomych</button>

                    @endif



            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 btn-group mt-3">
                <button class="btn btn-primary w-100">Zdjęcia</button>
                <button class="btn btn-primary w-100">Znajomi</button>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex text-center">
        @foreach($photos as $p)

            <div class="col-sm-12 mt-5" >
                <img class="img-responsive img-rounded w-25 card-img-top" src="../files/upload/{{$p->slug}}">

                <p class="h5 text-center w-25 mt-2" style="margin-left: auto;margin-right: auto">{{$p->description}}</p>

                <div class="jumbotron w-25 mt-3" style="margin-left: auto;margin-right: auto">
                    @foreach($p->comments as $c)
                        <div class="rounded pl-1 mt-2  w-100">
                            <div class="text-left h5">
                                <img style="width: 50px;" class="p-1 d-flex justify-content-start" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                                {{$c->author}}
                            </div>
                            <p class="text-left">{{$c->content}}</p>
                            <hr>
                        </div>

                    @endforeach
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="btn-group">
                                <button class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>
                                <button class="btn mt-2">0</button>
                            </div>
                        </div>
                        <div class="col-sm-2 d-flex justify-content-start">
                            <div class="btn-group">
                                <button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>
                                <button class="btn mt-2">0</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

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
                    $("#invite").before('<div class="alert alert-success">Wysłano zaproszenie do grona znajomych</div>')
                }
            });
        }

        function deleteFromFriends(i) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('AJAXDELETEFROMFRIENDS')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user='+ i,
                success: function () {
                    $("#delete").before('<div class="alert alert-success">Usunięto z grona znajomych</div>')
                }
            });

        }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @endsection