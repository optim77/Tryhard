<!DOCTYPE html>
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


    @yield('content')
    <div class="container-fluid" >

        <div class="row" style="height: 100vh">
            <div class="col-sm-6 bg-primary d-flex align-items-center text-white">
                <p class="lead text-center p-5">•Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum architecto commodi in beatae nam
                <br>•dolore repellendus, ad reiciendis. Assumenda accusantium mollitia eius quaerat iusto explicabo
                    reiciendis repellendus</p>
            </div>
            <div class="col-sm-6 ">
                <div class="d-flex flex-row-reverse mt-4 m-3">
                    <form class="form-inline" method="post" action="">
                        <input name="name" id="name" class="form-control m-2" type="text" placeholder="Nazwa użytkownika">

                        <input name="password" id="password" class="form-control m-2" type="password" placeholder="Hasło">

                        <input type="submit" class="btn btn-primary " value="Zaloguj">
                    </form>
                </div>
                <div class=" p-5 mt-5 ">
                    <p class="text-center h1 p-5 d-flex align-items-center">Nie posiadasz jeszcze konta ? Zarejestruj sie.</p>
                    <form method="post" action="" class="form-horizontal ">

                        <input name="name" id="name" class="form-control m-2" type="text" placeholder="Nazwa użytkownika">

                        <input name="password" id="password" class="form-control m-2" type="password" placeholder="Hasło">

                        <input name="email" id="email" class="form-control m-2" type="email" placeholder="Email">

                        <input type="submit" class="btn btn-primary mt-2" value="Zarejestruj">
                    </form>
                </div>
                <div class="footer">
                    <ul class="text-muted d-flex align-items-start">
                        <a class="text-muted m-1" href="">Kontakt</a>
                        <a class="text-muted m-1" href="">Marka</a>
                        <a class="text-muted m-1" href="">Zasady</a>
                        <a class="text-muted m-1" href="">O nas</a>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</body>
</html>