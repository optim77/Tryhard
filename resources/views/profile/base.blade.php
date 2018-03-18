@extends('master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8 col-lg-2">
                <div class="card" style="">
                    <img class="img-responsive img-rounded w-100 card-img-top" src="files/upload/{{$user->mainPhoto}}">
                    <p class="mt-2 p-1 text-center"><a class="h5 text-primary" href="{{route('getUserProfile',[$user->firstName,$user->surname,$user->id])}}">{{$user->firstName}} {{$user->surname}}</a></p>

                </div>
                <a href="{{route('rollerPage')}}" class="ml-1 mt-2 text-dark text-left">Losuj znajomych</a>
                <a href="{{route('upload')}}" class="ml-1 mt-2 text-dark text-left">Wgraj zdjecie</a>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            </div>
            <div class="col-sm-12 col-lg-8">

                {{--<div class="row table-bordered mb-5">--}}
                {{--@foreach($news as $n)--}}
                    {{--<div class="col-sm-2 p-3 m-3 text-center">--}}
                        {{--<a class="text-dark" href="{{route('getUserProfile',[$n->firstName,$n->surname,$n->user_id2])}}">--}}
                            {{--<img class="img-responsive  img-thumbnail" style="border-radius: 50%;" src="files/upload/{{$n->mainPhoto}}">--}}
                            {{--<p>{{$n->firstName}} {{$n->surname}}</p>--}}
                        {{--</a>--}}
                        {{--<hr>--}}
                    {{--</div>--}}

                    {{--@endforeach--}}
                    {{--<hr>--}}
                {{--</div>--}}


                <div class="row">
                    @if($photos != null)
                    @foreach($photos->photos as $p)



                        <div class="col-sm-12 text-center mt-2">

                            @foreach($photos->user as $u)
                                    <a class="text-dark" href="{{route('getUserProfile',[$u->firstName,$u->surname,$u->id])}}">
                                        <img class="img-responsive" style="width: 50px" src="files/upload/{{$u->mainPhoto}}">
                                        <p class="text-center">{{$u->firstName}} {{$u->surname}}</p>
                                    </a>
                            @endforeach

                            <a href="{{route('displayPhoto',$p->slug)}}">
                                <img class="img-thumbnail w-75" src="files/upload/{{$p->slug}}">
                                <p class="h5 text-center w-25 mt-2" style="margin-left: auto;margin-right: auto">{{$p->description}}</p>
                            </a>
                            <p>{{$p->description}}</p>
                                <div class="jumbotron w-75 mt-3" id="comments" style="margin-left: auto;margin-right: auto">
                                    <div id="current-comment"></div>
                                    <?php $i = 0; ?>
                                    @foreach($p->comments as $c)
                                        <?php $i++ ?>
                                        @if($i <= 2)

                                        @foreach($c->user as $a)
                                            <div class="text-left">
                                            <a class="text-dark text-left" href="{{route('getUserProfile',[$a->firstName,$a->surname,$a->id])}}">
                                                <img class="img-responsive" style="width: 50px" src="files/upload/{{$a->mainPhoto}}">
                                                {{$a->firstName}} {{$a->surname}}
                                            </a>
                                            </div>
                                                <p class="text-left mt-2 ml-2">{{$c->content}}</p>
                                                <hr>
                                        @endforeach
                                        @else

                                            @foreach($c->user as $a)
                                                <div class="text-left more" style="display: none">
                                                    <a class="text-dark text-left" href="{{route('getUserProfile',[$a->firstName,$a->surname,$a->id])}}">
                                                        <img class="img-responsive" style="width: 50px" src="files/upload/{{$a->mainPhoto}}">
                                                        {{$a->firstName}} {{$a->surname}}
                                                    </a>
                                                    <p class="text-left mt-2 ml-2">{{$c->content}}</p>
                                                    <hr>
                                                </div>
                                            @endforeach
                                                <?php $flag = 'hide' ?>
                                            @endif
                                    @endforeach
                                    @if(isset($flag) && $flag != null)
                                        <button onclick="showMore()" type="button" aria-label="Pokaż więcej" id="showMoreBtn" class="btn btn-primary w-100 mb-3">Pokaż więcej</button>
                                    @endif

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="btn-group">
                                                <button class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>
                                                <button class="btn mt-2">0</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 d-flex justify-content-start">
                                            <div class="btn-group">
                                                <button onclick="like({{$p->id}})" class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>
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
                            <hr>
                        </div>



                    @endforeach
                        @else


                        <div class="col-sm-12">
                            <p class="text-center text-muted h1">
                                <i class="fas fa-dot-circle"></i><br>
                                Brak postów</p>
                            <p class="h5 text-center text-muted">Dodaj znajomych by twoja tablica zakwitła</p>
                            <div class="text-center mt-4">
                                <a href="{{route('search')}}" class="btn btn-primary text-white">Szukaj znajomych</a>
                            </div>
                        </div>

                        @endif
                </div>

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

    @stop