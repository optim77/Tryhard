@extends('master')
@section('content')

    <div class="container mt-5">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="row">
            <div class="col-sm-3">
                @foreach($friends as $friend)

                    <div onclick="choose({{$friend->id}},'{{$friend->firstName}}','{{$friend->surname}}')" style="cursor: pointer;" class="hover">
                        <img class="img-responsive w-25" src="files/upload/{{$friend->mainPhoto}}">
                        <span class="text-center ml-3">{{$friend->firstName}}</span>
                        <hr>
                    </div>

                    @endforeach
            </div>

            <div id="chatplace" class="col-sm-6 border-left border-right">
                <div class="text-center mt5 text-muted h2">
                    <i class="fas fa-pencil-alt"></i>
                </div>
                <p id="empty" class="text-center mt4 text-muted h4">Zacznij czatować ze znajomymi</p>
            </div>

            <div class="col-sm-3">



            </div>

        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        function choose(i,n,s) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('getConversation')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user=' + i,
                success: function () {

                }
            });
            id = i;
            user = {{\Illuminate\Support\Facades\Auth::id()}}
            $("#chatplace").empty();
            $("#chatplace").append('<div class="">' +
                '<span class="text-center border-bottom w-100">'+n +'  '+ s +'</span>' +
                '<div class="col-sm-12" style="height:400px"></div><div class="">' +
                '<textarea id="textarea" class="form-control"></textarea><button onclick="send(id,user)" class="btn btn-info mt-1">Wyślij</button></div></div>')
        }

        function send(i,u) {
               let text =  $("#textarea").text();
            $.ajax({
                url: '{{route('getConversation')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user=' + i + 'text=' + text,
                success: function () {

                }
            });
        }

    </script>



    @endsection