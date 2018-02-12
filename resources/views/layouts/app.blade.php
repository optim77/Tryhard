@extends('master')
@section('content')
<div class="container-fluid" >

    <div class="row" style="height: 100vh">
        <div class="col-sm-6 bg-primary d-flex align-items-center text-white">
            <p class="lead text-center p-5">•Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum architecto commodi in beatae nam
                <br>•dolore repellendus, ad reiciendis. Assumenda accusantium mollitia eius quaerat iusto explicabo
                reiciendis repellendus
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet, aut cumque cupiditate deleniti dicta distinctio eius enim facere iusto labore laboriosam, natus nihil placeat reiciendis repellendus vel veniam voluptatem!</p>
        </div>
        <div class="col-sm-6 ">
            <div class="text-center mt-5 p-5 d-flex align-items-center">

                <p class="text-center h1 p-5 d-flex align-items-center">Logowanie</p>

                @include('auth.login')

            </div>
            <div class=" p-5 mt-5 ">

                <p class="text-center h1 p-5 d-flex align-items-center">Nie posiadasz jeszcze konta ? <a class="text-primary" href="{{route('rejestracja')}}">Zarejestruj sie.</a></p>

            </div>
            <div class="footer">
                <ul class="text-muted d-flex align-items-start">
                    <a class="text-muted m-1" href="">Kontakt</a>
                    <a class="text-muted m-1" href="">Marka</a>
                    <a class="text-muted m-1" href="">Zasady</a>
                    <a class="text-muted m-1" href="">O nas</a>
                    <a class="text-muted m-1" href="">Nie pamiętasz hasła ?</a>
                </ul>
            </div>
        </div>
    </div>

</div>
    @stop