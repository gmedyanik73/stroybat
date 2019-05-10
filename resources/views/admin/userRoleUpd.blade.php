@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r customForm">
        	<h1>Изменение роли пользователя #{{$id}}</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ url('Admin/userRoleUpdate') }}" aria-label="{{ __('Изменение роли пользователя') }}">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group row">
                    <label for="role" class="col-sm-4 col-form-label text-md-right">{{ __('Выберите роль') }}</label>

                    <div class="col-md-6">
                        <select name="role" class="txt_field{{ $errors->has('role') ? ' is-invalid' : '' }} slct" required>
                            @foreach($roles as $role)
                            <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                @endforeach
                        </select>
                        @if ($errors->has('role'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Изменить!') }}
                        </button>
                    </div>
                </div>
            </form>

        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')