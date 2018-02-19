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
                        @foreach($friends as $f)

                            @if($f->status == 'accepted')
                                <div class="row">
                                    <button class="btn btn-danger col-sm-5 mr-2" id="delete" onclick="deleteFromFriends({{$user->id}})" >Usuń ze znajomych</button>
                                    <button class="btn btn-danger col-sm-5" id="block" onclick="blockUser({{$user->id}})" >Blokuj</button>
                                </div>

                            @elseif($f->status == Auth::id())
                                <button class="btn btn-primary col-sm-12" id="cancel" onclick="cancelInvite({{$user->id}})" >Anuluj zaproszenie do grona znajomych</button>
                            @elseif($f->status == $user->id)
                                <button class="btn btn-primary col-sm-12" id="invite" onclick="cancelInvite({{$user->id}})" >Przyjmij zaproszenie do grona znajomych</button>
                            @elseif(isset($f))
                        @endif

                            @if($f->status == 'blocked - '.\Illuminate\Support\Facades\Auth::id())
                                    <button class="btn btn-primary col-sm-12" id="unlock" onclick="unlockUser({{$user->id}})" >Odblokuj użytkownika</button>

                                @elseif($f->status == 'blocked - '.$user->id)
                                    <button class="btn btn-primary col-sm-12" id="invite" >Zostałeś zablokowany przez tego użytkownika</button>

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

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @endsection