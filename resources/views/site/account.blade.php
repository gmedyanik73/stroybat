@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
        @if (count($errors)>0)
        <div class="alert">
            <span class="closebtn">&times;</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div id="content" class="float_r customForm">
        	<h1>{{$description.' '.Auth::user()->login}}</h1>
            <h3>
            <div><p><b>Имя пользователя: </b>{{Auth::user()->login}}</p></div>
            <div><p><b>E-mail: </b>{{Auth::user()->email}}</p></div>
            <div><p><b>Роль: </b>{{$role}}</p></div>
            </h3>
                <h2>Изменение пароля</h2>
            <form method="POST" id="pswd" name="pswd" class="pswd" action="{{ url('Account/updatePass') }}" aria-label="{{ __('Изменить пароль') }}">
                @csrf
                <div class="form-group row">
                    <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Старый паролль') }}</label>

                    <div class="col-md-6">
                        <input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" form="pswd" required>

                        @if ($errors->has('old_password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Новый пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" form="pswd" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторите новый пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" form="pswd" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                        <button type="submit" form="pswd">
                            {{ __('Изменить пароль!') }}
                        </button>
            </form>

        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')