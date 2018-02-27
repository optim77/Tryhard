@extends('master')
@section('content')
    <div class="container">

        <div class="row">
            <form method="post" action="{{route('profileSettings')}}" class="form-horizontal col-sm-12">
                {{csrf_field()}}
                <div class="row d-flex justify-content-center">
                    <div class=" col-sm-5 mt-5 p-4" style="border: 1px solid #333333;">
                        <p class="text-center h1"><i class="fas fa-address-card"></i></p>
                        <input type="text" name="firstName" id="firstName" class="form-control mb-3" placeholder="Imie">
                        <input type="text" name="surname" id="surname" class="form-control" placeholder="Nazwisko">
                        <label class="table-bordered p-3 mt-2" for="women">Kobieta
                            <input id="women" type="radio" value="women" class="form-control" name="sex"></label>

                        <label class="table-bordered p-3 mt-2" for="men">Meżczyzna
                            <input id="men" type="radio" value="men" class="form-control" name="sex"></label>

                    </div>
                    <div class="col-sm-5 ml-2 mt-5 p-4" style="border: 1px solid #333333;">
                        <p class="text-center h1"><i class="fas fa-calendar-alt"></i></p>
                        <input type="date" name="birthday" id="birthday" class="form-control">
                    </div>

                    <div class="col-sm-12">
                    </div>
                    <input type="submit" class="btn btn-primary text-center m-5" value="Zmień">
                </div>
            </form>


            <p class="text-center col-sm-12 h1">
                <i class="fas fa-map-marker"></i><br>
                Pozwól na zlokalizowanie<br>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </p>


        </div>

    </div>
@endsection