@extends('master')
@section('content')

    <div class="container mt-5">

        <div class="row">
            <div class="col-sm-3">
                @foreach($friends as $friend)

                    <div style="cursor: pointer;" class="hover">
                        <img class="img-responsive w-25" src="files/upload/{{$friend->mainPhoto}}">
                        <span class="text-center ml-3">{{$friend->firstName}}</span>
                        <hr>
                    </div>

                    @endforeach
            </div>

            <div class="col-sm-6 border-left border-right">
                <div class="text-center mt5 text-muted h2">
                    <i class="fas fa-pencil-alt"></i>
                </div>
                <p class="text-center mt4 text-muted h4">Zacznij czatować ze znajomymi</p>
            </div>

            <div class="col-sm-3">



            </div>

        </div>

    </div>

    <script>

    </script>

    @endsection