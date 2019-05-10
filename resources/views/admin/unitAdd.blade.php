@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r customForm">
        	<h1>Добавить единицу измерения</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ url('Admin/unitInsert') }}" aria-label="{{ __('Добавить у.е.') }}">
                @csrf

                <div class="form-group row">
                    <label for="unit_name" class="col-sm-4 col-form-label text-md-right">{{ __('Наимеование условной единицы') }}</label>

                    <div class="col-md-6">
                        <input id="unit_name" type="text" class="txt_field{{ $errors->has('unit_name') ? ' is-invalid' : '' }}" name="unit_name" value="{{ old('unit_name') }}" required autofocus>

                        @if ($errors->has('unit_name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_name') }}</strong>
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