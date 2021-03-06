
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<form method="POST" class="form-inline" action="{{ route('login') }}">
    @csrf

    <div class="form-group row">

        <div class="col-md-6">
            <input placeholder="Adres e-mail" id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} m-2" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">

        <div class="col-md-6">
            <input placeholder="Hasło" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} m-2" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{--<div class="form-group row">--}}
    {{--<div class="col-md-6 offset-md-4">--}}
    {{--<div class="checkbox">--}}
    {{--<label>--}}
    {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
    {{--</label>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="form-group row mb-0">
        <div class="col-md-4 offset-md-2">
            <button type="submit" class="btn btn-primary">
                Zaloguj
            </button>
        </div>
    </div>
</form>


        </div>
    </div>
</div>