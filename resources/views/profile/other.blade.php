@extends('master')
@section('content')
    <div class="container mt-5">
        <div class="row table-bordered p-3 radius">
            <div class="col-sm-3">
                <img class="img-responsive img-rounded w-100 card-img-top" src="../files/upload/{{$user->mainPhoto}}">
            </div>
            <div class="col-sm-9">
                <p class="text-left align-text-bottom"><i class="fas fa-user"></i>  {{$user->firstName}} {{$user->surname}}</p>
                <p class="text-left align-text-bottom"><i class="fas fa-user"></i>  {{$user->name}}</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-users"></i> {{$user->friends}}</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-star"></i> {{$user->stars}}</p>
                <p class="text-left align-text-bottom btn btn-danger"><i class="fas fa-eye"></i> {{$user->viewers}}</p>
                <meta name="csrf-token" content="{{ csrf_token() }}">

                    @if($friends != null)
                        @foreach($friends as $f)

                            @if($f->status == 'accepted')
                                <div class="row">
                                    <button class="btn btn-danger col-sm-5 mr-2" id="delete" onclick="deleteFromFriends({{$user->id}})" >Usuń ze znajomych</button>
                                    <button class="btn btn-danger col-sm-5" id="block" onclick="blockUser({{$user->id}})" >Blokuj</button>

                                </div>
                            @break
                            @elseif($f->status == Auth::id())
                                <button class="btn btn-primary col-sm-12" id="cancel" onclick="cancelInvite({{$user->id}})" >Anuluj zaproszenie do grona znajomych</button>
                            @break
                            @elseif($f->status == $user->id)
                                <button class="btn btn-primary col-sm-12" id="invite" onclick="cancelInvite({{$user->id}})" >Przyjmij zaproszenie do grona znajomych</button>
                            @break
                            @elseif(isset($f))
                        @endif

                            @if($f->status == 'blocked - '.\Illuminate\Support\Facades\Auth::id())
                                    <button class="btn btn-primary col-sm-12" id="unlock" onclick="unlockUser({{$user->id}})" >Odblokuj użytkownika</button>
                                    @break
                                @elseif($f->status == 'blocked - '.$user->id)
                                    <button class="btn btn-primary col-sm-12" id="invite" >Zostałeś zablokowany przez tego użytkownika</button>
                                    @break
                                @endif

                        @endforeach
                    @else
                        <button class="btn btn-primary col-sm-12" id="invite" onclick="addToFriends({{$user->id}})" >Zaproś do grona znajomych</button>
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
        @foreach($photos->photos as $p)

            <div class="col-sm-12 mt-5" >
                <a href="{{route('displayPhoto',$p->slug)}}">
                    <img class="img-responsive img-rounded w-25 card-img-top" src="../files/upload/{{$p->slug}}">

                    <p class="h5 text-center w-25 mt-2" style="margin-left: auto;margin-right: auto">{{$p->description}}</p>
                </a>
                <div class="jumbotron w-25 mt-3" id="comments" style="margin-left: auto;margin-right: auto">
                    <div id="current-comment"></div>
                    <?php $i = 0; ?>
                    @foreach($p->comments as $c)
                        <?php $i++ ?>
                        @if($i <= 2)
                        <div class="rounded pl-1 mt-2  w-100">
                            @foreach($c->user as $a)
                                <div class="text-left">
                                    <a class="text-dark" href="{{route('getUserProfile',[$a->firstName,$a->surname,$a->id])}}">
                                        <img class="img-responsive" style="width: 50px" src="../files/upload/{{$a->mainPhoto}}">
                                        {{$a->firstName}} {{$a->surname}}
                                    </a>
                                    <p class="text-left mt-2 ml-2">{{$c->content}}</p>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                            @else


                                @foreach($c->user as $a)
                                    <div class="text-left more" style="display: none">
                                        <a class="text-dark" href="{{route('getUserProfile',[$a->firstName,$a->surname,$a->id])}}">
                                            <img class="img-responsive" style="width: 50px" src="../files/upload/{{$a->mainPhoto}}">
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
            </div>
        @endforeach
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        document.onload = viewers();

        function viewers() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('addViewers')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user='+ {{$user->id}} + '&viewers=' + {{\Illuminate\Support\Facades\Auth::id()}},
                success: function () {

                }
            });
        }
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
                    $("#inviteAlert").before('<button class="btn btn-primary col-sm-12" id="invite" onclick="cancelInvite({{$user->id}})" >Anuluj zaproszenie do grona znajomych</button>').fadeIn('slow');
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
                    $("#delete").before('<div class="alert alert-success">Usunięto z grona znajomych</div>').fadeOut('slow');
                    $("#delete").before('<button class="btn btn-primary col-sm-12" id="invite" onclick="addToFriends({{$user->id}})" >Zaproś ponownie do znajomych</button>\n');
                    $("#delete").remove();
                }
            });
        }
        function cancelInvite(i) {

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
                    $("#cancel").before('<div class="alert alert-success">Anulowano zaproszenie</div>').fadeOut('slow');
                    $("#cancel").before('<button class="btn btn-primary col-sm-12" id="cancel" onclick="addToFriends({{$user->id}})" >Zaproś ponownie do znajomych</button>\n');
                    $("#cancel").remove();
                }
            });

        }
        function blockUser(i) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('AJAXBLOCKUSER')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user='+ i,
                success: function () {
                    $("#block").before('<div id="hide" class="alert alert-success">Użytkownik został zablokowany</div>');
                    $("hide").fadeOut('slow');
                    $("#block").before('<button class="btn btn-primary col-sm-12" id="invite" onclick="unlockUser({{$user->id}})" >Odblokuj użytkownika</button>\n');
                    $("#block").remove();

                }
            });
        }
        function unlockUser(i) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('AJAXUNLOCK')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user='+ i,
                success: function () {
                    $("#unlock").before('<div class="alert alert-success">Użytkownik został odblokowany</div>').fadeOut('slow');
                    $("#unlock").before('<button class="btn btn-primary col-sm-12" id="block" onclick="blockUser({{$user->id}})" >Zablokuj użytkownika</button>\n');
                    $("#unlock").remove();

                }
            });
        }
        function comment(i,c) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(c.length == 0){
                $("#current-comment").append("<div class='alert alert-danger'>Uzupełnij pole tekstowe</div>");
            }else {
                content = c;
                $.ajax({
                    url: '{{route('AJAXCOMMENT')}}',
                    type: 'POST',
                    dataType: 'json',
                    data: 'target=' + i + '&content=' + content,
                    success: function () {
                        $("#current-comment").append(
                            '<div class="rounded pl-1 mt-2  w-100">\n' +
                            '                            <div class="text-left h5">\n' +
                            '                                <img style="width: 50px;" class="p-1 d-flex justify-content-start" src="https://images.pexels.com/photos/433524/pexels-photo-433524.jpeg?w=1260&h=750&auto=compress&cs=tinysrgb">\n' +
                            '                                ' + c + '\n' +
                            '                            </div>\n' +
                            '                            <p class="text-left">' + c + '</p>\n' +
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

    </script>


    @endsection