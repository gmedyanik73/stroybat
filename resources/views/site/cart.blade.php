@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('site.layouts.categories',['categories' => $categories])
        </div>
        <div id="content" class="float_r">
        	<h1>{{$description}}</h1>
            <div class="d-table">
                <div class="d-tr">
                    <div class="d-td">Изображение</div>
                    <div class="d-td">Наименование</div>
                    <div class="d-td">Кол-во</div>
                    <div class="d-td">К оплате</div>
                    <div class="d-td">Действие</div>
                </div>
                @foreach ($carts as $cart)
                    <div class="d-tr">
                        <div class="d-td"><img src="{{ URL::to('/images').'/'.$cart->s_image }}" width="100"></div>
                        <div class="d-td">{{ $cart->s_name }}</div>
                        <div class="d-td">{{ $cart->c_count }}</div>
                        <div class="d-td">{{ ($cart->c_count*$cart->s_cost).$cart->unit_name }}</div>
                        <div class="d-td"><a href="OrderNewWp/{{$cart->c_id}}">Заказать</a>
                            <a href="CartDelete/{{$cart->c_id}}">Удалить</a></div>
                    </div>
                @endforeach
            </div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')