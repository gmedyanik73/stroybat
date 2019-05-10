@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r customForm">
        	<h1>Добавить услугу</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ url('Admin/serviceInsert') }}" aria-label="{{ __('service add') }}">
                @csrf

                <div class="form-group row">
                    <label for="s_category" class="col-sm-4 col-form-label text-md-right">{{ __('Выберите категорию услуги') }}</label>

                    <div class="col-md-6">
                        <select name="s_category" class="txt_field{{ $errors->has('email') ? ' is-invalid' : '' }} slct" required>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                @endforeach
                        </select>
                        @if ($errors->has('s_name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('s_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="s_name" class="col-sm-4 col-form-label text-md-right">{{ __('Наимеование услуги') }}</label>

                    <div class="col-md-6">
                        <input id="s_name" type="text" class="txt_field{{ $errors->has('email') ? ' is-invalid' : '' }}" name="s_name" value="{{ old('s_name') }}" required autofocus>

                        @if ($errors->has('s_name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('s_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="s_description" class="col-sm-4 col-form-label text-md-right">{{ __('Описание услуги') }}</label>

                    <div class="col-md-6">
                        <textarea id="s_description" class="txt_field{{ $errors->has('s_description') ? ' is-invalid' : '' }}" name="s_description" required autofocus>{{ old('s_description') }}</textarea>

                        @if ($errors->has('s_description'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('s_description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="s_cost" class="col-sm-4 col-form-label text-md-right">{{ __('Сторимость услуги') }}</label>

                    <div class="col-md-6">
                        <input id="s_cost" type="text" class="txt_field{{ $errors->has('s_cost') ? ' is-invalid' : '' }}" name="s_cost" value="{{ old('s_cost') }}" required autofocus>

                        @if ($errors->has('s_cost'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('s_cost') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="s_unit" class="col-sm-4 col-form-label text-md-right">{{ __('Выберите единицу измерения') }}</label>

                    <div class="col-md-6">
                        <select name="s_unit" class="txt_field{{ $errors->has('s_unit') ? ' is-invalid' : '' }} slct" required>
                            @foreach($units as $unit)
                                <option value="{{ $unit->unit_id }}">{{ $unit->unit_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('s_unit'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('s_unit') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <a href="{{url('Admin/unitAdd')}}">Добавить у.е</a>
                </div>

                <div class="form-group row">
                    <label for="s_image" class="col-sm-4 col-form-label text-md-right">{{ __('Выберите изображение для услуги') }}</label>

                    <div class="col-md-6">
                        <input type="file" name="s_image" class="txt_field{{ $errors->has('s_image') ? ' is-invalid' : '' }}" accept="image/*,image/jpeg" required>
                        @if ($errors->has('s_image'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('s_image') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Добавить') }}
                        </button>
                    </div>
                </div>
            </form>

        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')