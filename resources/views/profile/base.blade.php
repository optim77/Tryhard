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
                                                <div class="text-left">
                                                    <a class="text-dark text-left" href="{{route('getUserProfile',[$a->firstName,$a->surname,$a->id])}}">
                                                        <img class="img-responsive" style="width: 50px" src="files/upload/{{$a->mainPhoto}}">
                                                        {{$a->firstName}} {{$a->surname}}
                                                    </a>
                                                </div>
                                                <p class="text-left mt-2 ml-2">{{$c->content}}</p>
                                                <hr>
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
                                                <button class="btn mt-2">0</button>
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

    @stop