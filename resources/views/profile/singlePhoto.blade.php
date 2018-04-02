@extends('master')

@section('content')

    <div class="container">
        <div class="col-sm-12 mt-5">
            @foreach($photo as $p)
                <img class="w-100" src="../files/upload/{{$p->slug}}">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                    <p class="text-center">{{$p->description}}</p>

                    <div class="col-sm-12 text-center mt-2">
                        <a class="text-dark" href="{{route('getUserProfile',[$p->user[0]->firstName,$p->user[0]->surname,$p->user[0]->id])}}">
                            <img class="img-responsive" style="width: 50px" src="../files/upload/{{$p->user[0]->mainPhoto}}">
                            <p class="text-center">{{$p->user[0]->firstName}} {{$p->user[0]->surname}}</p>
                        </a>
                    </div>
            <div class="jumbotron w-75 mt-3" id="comments" style="margin-left: auto;margin-right: auto">
                <div id="current-comment"></div>
                    @foreach($p->comments as $c)


                        <?php $i = 0; ?>

                        @foreach($p->comments as $c)
                            <?php $i++ ?>
                            @if($i <= 2)

                                @foreach($c->user as $a)
                                    <div class="text-left">
                                        <a class="text-dark text-left" href="{{route('getUserProfile',[$a->firstName,$a->surname,$a->id])}}">
                                            <img class="img-responsive" style="width: 50px" src="../files/upload/{{$a->mainPhoto}}">
                                            {{$a->firstName}} {{$a->surname}}
                                        </a>
                                    </div>
                                    <p class="text-left mt-2 ml-2">{{$c->content}}</p>
                                    <hr>

                                @endforeach
                            @else

                                @foreach($p->user as $a)
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


                    @break
                    @endforeach

                 <div class="row">
                            <div class="col-sm-2">
                                <div class="btn-group">

                                    <button onclick="like({{$p->id}})" class="btn btn-primary mt-2"><i class="fas fa-star"></i></button>

                                    <button class="btn mt-2">{{count($p->rate)}}</button>
                                </div>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-start">
                                <div class="btn-group">
                                    <button  class="btn btn-primary mt-2"><i class="fas fa-comments"></i></button>
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

            @endforeach

        </div>
    </div>
    <script src="../js/mainScripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                    $(this).addClass('alert alert-success');
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

        function showMore() {
            $(".more").fadeToggle('slow','swing',function () {
                $("#showMoreBtn").html('Pokaż mniej')
            });
        }

    </script>
    @endsection