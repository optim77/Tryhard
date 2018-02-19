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
                <a class="btn btn-primary col-sm-12" href="">Edytuj profil</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 btn-group mt-3">
                <button class="btn btn-primary w-100">Znajomi</button>
                <button class="btn btn-primary w-100">Powiadomienia</button>
            </div>
        </div>


        <div class="row mt-3 d-flex text-center">
            @foreach($photos as $p)

                <div class="col-sm-12 mt-5" >
                    <img class="img-responsive img-rounded w-50 card-img-top" src="files/upload/{{$p->slug}}">

                    <p class="h5 text-center w-50 mt-2" style="margin-left: auto;margin-right: auto">{{$p->description}}</p>

                    <div class="jumbotron w-50 mt-3" style="margin-left: auto;margin-right: auto">
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
    </div>


    @endsection