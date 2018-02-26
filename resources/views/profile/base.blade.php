@extends('master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 col-lg-2">
                <div class="card" style="">
                    <img class="img-responsive img-rounded w-100 card-img-top" src="files/upload/{{$user->mainPhoto}}">
                    <p class="mt-2 p-1 text-center"><a class="h5 text-primary" href="{{route('getUserProfile',[$user->firstName,$user->surname,$user->id])}}">{{$user->firstName}} {{$user->surname}}</a></p>

                </div>
                <p class="ml-2 mt-2">Losuj znajomych</p>
            </div>
            <div class="col-sm-12 col-lg-8">


                <div class=" p-5" style="border-top: solid 5px #007bff">
                    <img class="img-responsive img-rounded w-100" src="https://static.pexels.com/photos/119730/pexels-photo-119730.jpeg">

                    <div class="rounded pl-1 mt-2 bg-warning">
                        <div class="h5"><img style="width: 50px;" class="p-1" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">Lorem</div>
                        <p class="">Lorem</p>
                    </div>

                    <div class="rounded pl-1 mt-2 bg-warning" >
                        <div class="h5"><img style="width: 50px;" class="p-1" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">Lorem</div>
                        <p class="">Lorem</p>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="btn-group">
                                <button class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>
                                <button class="btn mt-2">0</button>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="btn-group">
                                <button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>
                                <button class="btn mt-2">0</button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-inline mt-2 d-flex justify-content-start">
                                <textarea class="form-control mr-1 ml-sm-4 ml-lg-0 w-50"rows="1"></textarea>
                                <input type="button" class="btn btn-primary " value="Wyślij">
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" p-5" style="border-top: solid 5px #007bff">
                    <img class="img-responsive img-rounded w-100" src="https://static.pexels.com/photos/119730/pexels-photo-119730.jpeg">
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                                <div class="btn-group">
                                    <button class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>
                                    <button class="btn mt-2">0</button>
                                </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="btn-group">
                                <button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>
                                <button class="btn mt-2">0</button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-inline mt-2 d-flex justify-content-start">
                                <textarea class="form-control mr-1 ml-sm-4 ml-lg-0 w-50"rows="1"></textarea>
                                <input type="button" class="btn btn-primary " value="Wyślij">
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" p-5" style="border-top: solid 5px #007bff">
                    <img class="img-responsive img-rounded w-100" src="https://static.pexels.com/photos/119730/pexels-photo-119730.jpeg">
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="btn-group">
                                <button class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>
                                <button class="btn mt-2">0</button>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="btn-group">
                                <button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>
                                <button class="btn mt-2">0</button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-inline mt-2 d-flex justify-content-start">
                                <textarea class="form-control mr-1 ml-sm-4 ml-lg-0 w-50"rows="1"></textarea>
                                <input type="button" class="btn btn-primary " value="Wyślij">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-2 d-sm-none d-lg-block">
                <div class="card">
                    <p class="text-center card-header "><a href="" >Odwiedzający</a></p>
                    <div class="card-body">
                        <p class="text-center">Lorem ipsum<hr></p>
                        <p class="text-center">Lorem ipsum<hr></p>
                        <p class="text-center">Lorem ipsum<hr></p>
                        <p class="text-center"><a href="">Zobacz więcej</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @stop