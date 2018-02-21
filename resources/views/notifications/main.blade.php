@extends('master')

@section('content')

    @include('components.topBar')

    <div class="container mt-5">
        <div class="row">
        @foreach($notice as $n)
            <div class=" p-5 col-sm-12 text-center" style="border-top: solid 5px #007bff">
            @if($n->status == $n->user_id2)
                <a class="text-dark">
                    <a class="text-dark" href="{{route('getUserProfile',[$n->firstName,$n->surname,$n->id])}}">

                    {{$n->firstName}} {{$n->surname}}
                    </a>
                </a>

                 chce dołączyć do grona twoich znajomych<br>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                <button id="accept" onclick="acceptFriends({{$n->user_id2}})" class="btn btn-primary">Akceptuj</button>
                <button id="delete" onclick="deleteFromFriends({{$n->user_id2}})" class="btn btn-danger">Usuń</button>
            @endif
            </div>
            @endforeach
        </div>
    </div>

    <script>

        function acceptFriends(i) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route('AJAXACCEPTINVITE')}}',
                type: 'POST',
                dataType: 'json',
                data: 'user='+ i,
                success: function () {
                    $("#accept").before('<div class="alert alert-success">Przyjęto zaproszenie</div>').fadeOut('slow');
                    $('#accept').next('#delete').remove();
                    $("#accept").remove();
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
                    $("#delete").before('<div class="alert alert-success">Usunięto zaproszenie</div>').fadeOut('slow');
                    $("#delete").remove();
                }
            });
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @endsection