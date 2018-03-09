@extends('master')

@section('content')
    
    <div class="container">
        <div class="col-sm-12">
            @foreach($photo as $p)
                <img class="w-50" src="../files/upload/{{$p->slug}}">

                @foreach($p->comments as $c)

                    <?php dump($c) ?>
                    {{$c->content}}

                    @endforeach

            @endforeach

        </div>
        
    </div>

    @endsection