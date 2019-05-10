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
                    <div class="d-td">№заказа</div>
                    <div class="d-td">Изображение</div>
                    <div class="d-td">Статус вып.</div>
                    <div class="d-td">Наименование</div>
                    <div class="d-td">Сумма</div>
                    <div class="d-td">Оплачено</div>
                </div>
                @foreach ($orders as $order)
                    <div class="d-tr">
                        <div class="d-td">{{ $order->o_id }}</div>
                        <div class="d-td"><img src="{{ URL::to('/images').'/'.$order->s_image }}" width="100"></div>
                        <div class="d-td">{{ $order->st_name }}</div>
                        <div class="d-td">{{ $order->s_name}}</div>
                        <div class="d-td">{{ $order->o_sum }}</div>
                        <div class="d-td">{{ $order->p_sum }}</div>
                    </div>
                @endforeach
            </div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')