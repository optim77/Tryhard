<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/res.css">
    <script src="js/mainScripts.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container-fluid" >
    <div class="row" style="height: 100vh">
        <div class="col-sm-6 bg-primary d-flex align-items-center text-white">
            <p class="lead text-center p-5">•Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum architecto commodi in beatae nam
                <br>•dolore repellendus, ad reiciendis. Assumenda accusantium mollitia eius quaerat iusto explicabo
                reiciendis repellendus
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet, aut cumque cupiditate deleniti dicta distinctio eius enim facere iusto labore laboriosam, natus nihil placeat reiciendis repellendus vel veniam voluptatem!</p>
        </div>
        <div class="col-sm-6 ">

            <p class="text-center h1 mt-5 p-5 d-flex align-items-center">Rejestracja</p>


            <div class="text-center  mt-5 p-5 d-flex align-items-center">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-default">

                                @if(Session::get('success'))
                                    <div class="alert alert-success text-center">
                                        {{Session::get('success')}}
                                    </div>
                                @endif

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa użytkownika</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Hasło</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Potwierdź hasło</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Zarejestruj
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
</body>
</html>

