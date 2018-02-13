@extends('master')
@section('content')


    <div style="height: 4vh;background-color: #007bff" class="container-fluid text-white">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <p class="d-flex justify-content-center h3">Logo</p>
            </div>
            <div class="col-sm-1">
                <p class="d-flex justify-content-center h5 mt-2"><i class="fas fa-user"></i></p>
            </div>
            <div class="col-sm-1">
                <p class="d-flex justify-content-center h5 mt-2">Szukaj</p>
            </div>
            <div class="col-sm-1">
                <p id="profileButton" style="cursor: pointer" class="d-flex justify-content-center h5 mt-2"><i class="fas fa-cog h5"></i></p>
                <ul id="profileList"  class="d-flex justify-content-center text-dark list-group text-center">
                    <a href="" style="display: none" class="list-group-item profileList">Ustawienia</a>
                    <a href="" style="display: none" class="list-group-item profileList">Wyloguj</a>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-2 col-lg-2">
                <div class="" style="">
                    <img class="img-responsive img-rounded w-100 radius" src="https://static.pexels.com/photos/129459/pexels-photo-129459.jpeg">
                    <p class="mt-2">Lorem ipsum</p>
                </div>
            </div>
            <div class="col-sm-8">
                <div class=" p-5" style="border-top: solid 5px #007bff">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Adipisci animi cum doloremque eligendi est facilis quasi quos repellat sequi sint.
                    Amet commodi dicta fugit illo odio perferendis perspiciatis soluta voluptates.
                </div>

                <div class=" p-5" style="border-top: solid 5px #007bff">
                    <img class="img-responsive img-rounded w-100" src="https://static.pexels.com/photos/119730/pexels-photo-119730.jpeg">
                    <div class="row">
                        <div class="col-sm-2">
                                <div class="btn-group">
                                    <button class="btn btn-primary mt-2">Like</button>
                                    <button class="btn mt-2">0</button>
                                </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-inline mt-2 d-flex justify-content-start">
                                <textarea class="form-control mr-1 ml-sm-4 ml-lg-0 "rows="1"></textarea>
                                <input type="button" class="btn btn-primary" value="Wyślij">
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" p-5" style="border-top: solid 5px #007bff">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Adipisci animi cum doloremque eligendi est facilis quasi quos repellat sequi sint.
                    Amet commodi dicta fugit illo odio perferendis perspiciatis soluta voluptates.
                </div>

            </div>
            <div class="col-sm-2 d-sm-none">
                <div class="card">
                    <p class="text-center card-header "><a href="" >Odwiedzający</a></p>
                    <div class="card-body">
                        <p class="text-center">Lorem ipsum<hr></p>
                        <p class="text-center">Lorem ipsum<hr></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $("#profileButton").click(function () {
            $(".profileList").toggle();
        })
    </script>
    @stop