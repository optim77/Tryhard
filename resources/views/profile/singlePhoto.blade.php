@extends('master')

@section('content')
    
    <div class="container">
        <div class="col-sm-12">
            @foreach($photo as $p)
                <img class="w-50" src="../files/upload/{{$p->slug}}">
            @endforeach

        </div>
        
    </div>

    @endsection