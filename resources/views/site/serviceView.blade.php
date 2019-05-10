@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('site.layouts.categories',['categories' => $categories])
        </div>
        <div id="content" class="float_r">
        	<h1>{{$description.' '.$service->s_name}}</h1>
            <div><p>{{'Категория: '.$service->cat_name}}</p></div>
            <a href="{{URL::to('/images').'/'.$service->s_image}}"><img src="{{URL::to('/images').'/'.$service->s_image}}" alt="{{$service->s_name}}" width="400" /></a>
            <div><p>{{'Описание: '.$service->s_description}}</p></div>
            <div><p>{{'Цена за '.$service->unit_name.': '.$service->s_cost.'руб.'}}</p></div>
            <form method="POST" aria-label="{{ __('service add') }}">
                @csrf

                <div class="row">
                    <input id="s_id" type="text" name="s_id" value="{{$service->s_id }}" hidden>
                    <label for="count">{{ __('Количество') }}</label>
                        <input id="count" type="text" class="txt_field{{ $errors->has('count') ? ' is-invalid' : '' }}" name="count" value="{{ old('count') }}" size="3" maxlength="3" required autofocus>{{$service->unit_name}}

                        @if ($errors->has('count'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
                        @endif

                        <button type="submit" name="act" value="addCart" formaction="{{ url('CartAdd') }}">
                            {{ __('В корзину') }}
                        </button>
                        <button type="submit" name="act" value="addOrder" formaction="{{ url('OrderNew') }}">
                            {{ __('Заказать!') }}
                        </button>
                </div>
            </form>

        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')