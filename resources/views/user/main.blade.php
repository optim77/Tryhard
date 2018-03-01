@extends('master')
@section('content')


    <div class="container mt-5">
        <div class="row table-bordered p-3 radius">
            <div class="col-sm-3">
                <img class="img-responsive img-rounded w-100 card-img-top" src="files/upload/{{$user->mainPhoto}}" alt="<img src=''>">
            </div>
            <div class="col-sm-9">
                <div class="d-flex flex-row-reverse">
                    <a class="btn btn-primary " href="{{route('profileSettings')}}"><i class="fas fa-wrench"></i></a>
                </div>
                <p class="text-left align-text-bottom"><i class="fas fa-user"></i>  {{$user->firstName}} {{$user->surname}}</p>
                <p class="text-left align-text-bottom"><i class="fas fa-user"></i>  Pseudonim</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-users"></i> 566</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-star"></i> 4123</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-eye"></i> 32221</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 btn-group mt-3">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <a href="{{route('getFriends')}}" class="btn btn-primary w-100">Znajomi</a>
                <button class="btn btn-primary w-100">Powiadomienia</button>
            </div>
        </div>

        <div id="profileContent" class="row mt-3 d-flex text-center">
            @foreach($user->photos as $p)
                <div class="col-sm-12 mt-5" >
                    <button onclick="setProfilePhoto($(this).next('.card-img-top').attr('src'))" id="setImageBtn" class="btn btn-primary position-absolute  mt-2 ml-2"><i class="fas fa-images"></i></button>

                    <img class="img-responsive img-rounded w-50 card-img-top getImg" src="files/upload/{{$p->slug}}">

                    <p class="h5 text-center w-50 mt-2" style="margin-left: auto;margin-right: auto">{{$p->description}}</p>
                    <div class="jumbotron w-50 mt-3" style="margin-left: auto;margin-right: auto">
                        <div id="current-comment"></div>
                        <?php $i = 0; ?>
                        @foreach($p->comments as $c)

                            <?php $i++ ?>
                            @if($i <= 2)
                                <div class="rounded pl-1 mt-2  w-100">
                                    <div class="text-left h5">
                                        <img style="width: 50px;" class="p-1 d-flex justify-content-start" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                                        {{$c->author}}
                                    </div>
                                    <p class="text-left">{{$c->content}}</p>
                                    <p class="text-muted d-flex justify-content-end align-text-top">{{$c->created_at}}</p>
                                    <hr>
                                </div>
                            @else


                                <div class="rounded pl-1 mt-2 more  w-100" style="display: none">
                                    <div class="text-left h5">
                                        <img style="width: 50px;" class="p-1 d-flex justify-content-start" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">
                                        {{$c->author}}
                                    </div>
                                    <p class="text-left">{{$c->content}}</p>
                                    <p class="text-muted d-flex justify-content-end align-text-top">{{$c->created_at}}</p>
                                    <hr>
                                </div>

                                <?php $flag = 'hide' ?>

                            @endif
                        @endforeach
                        @if(isset($flag) && $flag != null && $flag == 'hide')
                            <button onclick="showMore()" type="button" aria-label="Pokaż więcej" id="showMoreBtn" class="btn btn-primary w-100 mb-3">Pokaż więcej</button>
                        @endif

                            <div class="row">
                                <div class="col-sm-2">

                                    <div class="btn-group">
                                        <?php $liked = 'false' ?>
                                        @foreach($p->rate as $r)
                                            @if($r->users == Auth::id())
                                                <button onclick="unlike({{$p->id}})" class="btn btn-success mt-2"><i class="fas fa-star"></i></button>
                                                <?php $liked = 'true' ?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if(isset($liked) && $liked != 'true')
                                                <button onclick="like({{$p->id}})" class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>
                                            @endif
                                        <button class="btn mt-2">{{count($p->rate)}}</button>
                                    </div>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-start">
                                    <div class="btn-group">
                                        <button class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>
                                        <button class="btn mt-2">{{count($p->comments)}}</button>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-inline mt-5 d-flex justify-content-start">
                                        <textarea id="commentContext" class="form-control mr-1 ml-sm-12 ml-lg-0 w-100"rows="1"></textarea>
                                        <input onclick="comment({{$p->id}},$(this).prev('#commentContext').val())" type="button" class="btn btn-primary mt-2" value="Wyślij">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>


    <script>

        function comment(i,c) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(c.length == 0){
                $("#current-comment").append("<div class='alert alert-danger'>Uzupełnij pole tekstowe</div>");
            }else{
                content = c;
                $.ajax({
                    url: '{{route('AJAXCOMMENT')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: 'target='+ i + '&content=' + content,
                    success: function () {
                        $("#current-comment").append(
                            '<div class="rounded pl-1 mt-2  w-100">\n' +
                            '                            <div class="text-left h5">\n' +
                            '                                <img style="width: 50px;" class="p-1 d-flex justify-content-start" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">\n' +
                            '                                '+c+'\n' +
                            '                            </div>\n' +
                            '                            <p class="text-left">'+c+'</p>\n' +
                            '                            <hr>\n' +
                            '                        </div>'
                        )

                    }
                });
            }

        }
        function showMore() {
            $(".more").fadeToggle('slow','swing',function () {
                $("#showMoreBtn").html('Pokaż mniej')
            });
        }
        function setProfilePhoto(p) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('AJAXSETIMAGE')}}',
                type: 'POST',
                dataType: 'json',
                data: 'photo='+ p,
                success: function () {
                    $("#setImageBtn").after(
                        '<div class="alert alert-success">Zmieniono zdjęcie profilowe</div>'
                    )

                }
            });
        }
        function like(p) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('rate')}}',
                type: 'POST',
                dataType: 'json',
                data: 'photo='+ p,
                success: function () {
                    $(this).css('background','#ffffff');
                }
            });
        }
        function unlike(p) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('unlike')}}',
                type: 'POST',
                dataType: 'json',
                data: 'photo='+ p,
                success: function () {

                }
            });
        }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @endsection