@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r customForm">
        	<h1>Добавить услугу</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ url('Admin/categoryInsert') }}" aria-label="{{ __('category add') }}">
                @csrf

                <div class="form-group row">
                    <label for="cat_name" class="col-sm-4 col-form-label text-md-right">{{ __('Наимеование категории') }}</label>

                    <div class="col-md-6">
                        <input id="cat_name" type="text" class="txt_field{{ $errors->has('cat_name') ? ' is-invalid' : '' }}" name="cat_name" value="{{ old('cat_name') }}" required autofocus>

                        @if ($errors->has('cat_name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cat_description" class="col-sm-4 col-form-label text-md-right">{{ __('Описание категории') }}</label>

                    <div class="col-md-6">
                        <textarea id="cat_description" class="txt_field{{ $errors->has('cat_description') ? ' is-invalid' : '' }}" name="cat_description" required autofocus>{{ old('cat_description') }}</textarea>

                        @if ($errors->has('cat_description'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat_description') }}</strong>
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