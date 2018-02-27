@extends('master')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-sm-12 mt-5">

                <div class="col-sm-12 text-center">
                    <img id="rollImg" src="https://assets.materialup.com/uploads/30080ad4-97ee-47f7-a98a-c0d2e8d704b2/preview">
                    <div class="col-sm-12 text-center">
                        <a target="_blank" id="redirectToProfile" class="text-dark" href="">
                            <img class="mt-2 mb-2 w-50" id="selected" src="">
                            <p id="nameUser" class="text-center"></p>
                        </a>
                    </div>

                </div>

            </div>

            <div class="col-sm-12 mt-5">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="form-inline d-flex justify-content-center">
                    <label class="radio-inline m-3 radius text-white p-2 bg-primary table-bordered">
                        <input type="radio" id="women" value="women" name="optradio"><i class="fab fa-medium-m"></i></label>

                    <label class="radio-inline m-3 radius text-white p-2 bg-primary table-bordered">
                        <input type="radio" id="men" value="men" name="optradio">Option 2</label>

                    <label class="radio-inline m-3 radius text-white p-2 bg-primary table-bordered">
                        <input type="radio" id="all" value="all" name="optradio"><i class="fas fa-users h3"></i></label>
                </div>

                <button onclick="roll()"  class="btn btn-primary w-100">Losuj</button>
            </div>

            <div class="col-sm-12 mt-2">
                <div class="previously row">

                </div>
            </div>

        </div>

    </div>

    <script>
        function roll() {

            $("#rollImg").show();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let radios = document.getElementsByName('optradio');

            for (var i = 0, length = radios.length; i < length; i++)
            {
                if (radios[i].checked)
                {
                    var gender = radios[i].value;
                    break;
                }
            }

            $('#rollImg').toggleClass('rotated');

            $.ajax({
                url: '{{route('getRoll')}}',
                type: 'POST',
                dataType: 'json',
                data: 'roll='+ 'yes' + '&gender=' + gender,
                success: function (e) {
                    $("#rollImg").hide();
                    let first = e.user[0].firstName;
                    let surname = e.user[0].surname;
                    let id = e.user[0].id;
                    let link = 'profile/'+ first + '-' + surname + '-' + id;
                    $("#redirectToProfile").attr('href',link);
                    $("#selected").attr('src','files/upload/' + e.user[0].mainPhoto);
                    $("#nameUser").text(e.user[0].firstName + ' ' + e.user[0].surname);
                    $(".previously").append(
                        '<div class="col-sm-3 text-center">\n' +
                        '                        <a target="_blank" id="redirectToProfile" class="text-dark" href="profile/'+first + '-' + surname + '-' + id+'">\n' +
                        '                            <img class="mt-2 mb-2 w-100" id="selected" src="files/upload/'+e.user[0].mainPhoto+'">\n' +
                        '                            <p id="nameUser" class="text-center">'+ e.user[0].firstName + ' ' + e.user[0].surname+'</p>\n' +
                        '                        </a>\n' +
                        '                    </div>'
                    )
                }
            });
        }

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    @endsection