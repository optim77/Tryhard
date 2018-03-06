@extends('master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <div class="card" style="">
                    <img class="img-responsive img-rounded w-100 card-img-top" src="files/upload/{{$user->mainPhoto}}">
                    <p class="mt-2 p-1 text-center"><a class="h5 text-primary" href="{{route('getUserProfile',[$user->firstName,$user->surname,$user->id])}}">{{$user->firstName}} {{$user->surname}}</a></p>

                </div>
                <a href="{{route('rollerPage')}}" class="ml-1 mt-2 text-dark text-left">Losuj znajomych</a>
                <a href="{{route('upload')}}" class="ml-1 mt-2 text-dark text-left">Wgraj zdjecie</a>
            </div>
            <div class="col-sm-12 col-lg-8">

                <div class="row">


                @foreach($news as $n)
                    <div class="col-sm-2 p-3 m-3 text-center">
                        <a class="text-dark" href="{{route('getUserProfile',[$n->firstName,$n->surname,$n->user_id2])}}">
                            <img class="img-responsive  img-thumbnail" style="border-radius: 50%;" src="files/upload/{{$n->mainPhoto}}">
                            <p>{{$n->firstName}} {{$n->surname}}</p>
                        </a>
                        <hr>
                    </div>

                    @endforeach
                    <hr>
                </div>
                <div class="row">
                    @foreach($photos as $p)
                        <div class="col-sm-12 text-center">
                            <p class="text-left">{{$p->author}}</p>
                            <img class="img-thumbnail w-75" src="files/upload/{{$p->slug}}">
                        </div>

                    @endforeach
                </div>



                {{--<div class=" p-5" style="border-top: solid 5px #007bff">--}}
                    {{--<img class="img-responsive img-rounded w-100" src="https://static.pexels.com/photos/119730/pexels-photo-119730.jpeg">--}}

                    {{--<div class="rounded pl-1 mt-2 bg-warning">--}}
                        {{--<div class="h5"><img style="width: 50px;" class="p-1" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">Lorem</div>--}}
                        {{--<p class="">Lorem</p>--}}
                    {{--</div>--}}

                    {{--<div class="rounded pl-1 mt-2 bg-warning" >--}}
                        {{--<div class="h5"><img style="width: 50px;" class="p-1" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">Lorem</div>--}}
                        {{--<p class="">Lorem</p>--}}
                    {{--</div>--}}

                    {{--<hr>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-2">--}}
                            {{--<div class="btn-group">--}}
                                {{--<button class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>--}}
                                {{--<button class="btn mt-2">0</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-2">--}}
                            {{--<div class="btn-group">--}}
                                {{--<button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>--}}
                                {{--<button class="btn mt-2">0</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-8">--}}
                            {{--<div class="form-inline mt-2 d-flex justify-content-start">--}}
                                {{--<textarea class="form-control mr-1 ml-sm-4 ml-lg-0 w-50"rows="1"></textarea>--}}
                                {{--<input type="button" class="btn btn-primary " value="Wyślij">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class=" p-5" style="border-top: solid 5px #007bff">--}}
                    {{--<img class="img-responsive img-rounded w-100" src="https://static.pexels.com/photos/119730/pexels-photo-119730.jpeg">--}}
                    {{--<hr>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-2">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<button class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>--}}
                                    {{--<button class="btn mt-2">0</button>--}}
                                {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-2">--}}
                            {{--<div class="btn-group">--}}
                                {{--<button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>--}}
                                {{--<button class="btn mt-2">0</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-8">--}}
                            {{--<div class="form-inline mt-2 d-flex justify-content-start">--}}
                                {{--<textarea class="form-control mr-1 ml-sm-4 ml-lg-0 w-50"rows="1"></textarea>--}}
                                {{--<input type="button" class="btn btn-primary " value="Wyślij">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class=" p-5" style="border-top: solid 5px #007bff">--}}
                    {{--<img class="img-responsive img-rounded w-100" src="https://static.pexels.com/photos/119730/pexels-photo-119730.jpeg">--}}
                    {{--<hr>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-2">--}}
                            {{--<div class="btn-group">--}}
                                {{--<p class="btn btn-primary mt-2"><i class="fas fa-star"></i></p>--}}
                                {{--<button class="btn mt-2">0</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-2">--}}
                            {{--<div class="btn-group">--}}
                                {{--<button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>--}}
                                {{--<button class="btn mt-2">0</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-8">--}}
                            {{--<div class="form-inline mt-2 d-flex justify-content-start">--}}
                                {{--<textarea class="form-control mr-1 ml-sm-4 ml-lg-0 w-50"rows="1"></textarea>--}}
                                {{--<input type="button" class="btn btn-primary " value="Wyślij">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
            <div class="col-sm-2 d-sm-none d-lg-block">
                <div class="card">
                    <p class="text-center card-header ">Odwiedzający</p>
                    <div class="card-body">
                        @foreach($visitors as $v)
                            <p class="text-center">
                                <a class="text-dark" href="{{route('getUserProfile',[$v->firstName,$v->surname,$v->id])}}">
                                {{$v->firstName}} {{$v->surname}}
                                </a>
                                <hr>
                            </p>
                            @endforeach
                        <p class="text-center"><a href="{{route('visitorsPage')}}">Zobacz więcej</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @stop