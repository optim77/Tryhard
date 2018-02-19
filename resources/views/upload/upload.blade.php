@extends('master')
@section('content')


    @include('components.topBar')

    <div class="container">
        <p class="text-center h3 mt-5 mb-5">Wgraj zdjęcie</p>
        @if($errors->any())
            <h5 class="alert alert-danger">{{$errors->first()}}</h5>
        @endif
        <form class="form-horizontal" action="{{route('upload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="file">Wybierz plik:</label>
            <input id="file" name="file" type="file" class="form-control" required>
            <label for="description">Opis:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            <input id="submit" name="submit" type="submit" class="btn btn-primary m-3" value="Wyślij">
        </form>

        <div class="row">
            <div class="col-sm-12 text-center w-75">
                <img id="blah" src="#" alt="" />
            </div>
        </div>

    </div>



    <script>

        var files;

        // Add events
        $('input[type=file]').on('change', prepareUpload);

        // Grab the files and set them to our variable
        function prepareUpload(event)
        {
            files = event.target.files;

            if (files[0].size > 500000){
                $("#file").before('<div class="h5 alert alert-danger">Plik jest zbyt duży</div>');

            }

            let ext = ['image/jpeg','image/jpg'];
            extension = files[0].type;

            if ($.inArray(extension,ext) == -1){
                $("#file").before('<div class="h5 alert alert-danger">Zły format pliku</div>');

            }
        }

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $("#file").change(function() {
            readURL(this);
        });

    </script>

    @endsection