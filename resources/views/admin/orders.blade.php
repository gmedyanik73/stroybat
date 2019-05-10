@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r">
        	<h1>{{$description}}</h1>
            <div class="d-table">
                <div class="d-tr">
                    <div class="d-td">№заказа</div>
                    <div class="d-td">Изображение</div>
                    <div class="d-td">Наименование</div>
                    <div class="d-td">Сумма</div>
                    <div class="d-td">Оплачено</div>
                    <div class="d-td">Статус вып.</div>
                </div>
                @foreach ($orders as $order)
                    <div class="d-tr">
                        <div class="d-td">{{ $order->o_id }}</div>
                        <div class="d-td"><img src="{{ URL::to('/images').'/'.$order->s_image }}" width="100"></div>
                        <div class="d-td">{{ $order->s_name}}</div>
                        <div class="d-td">{{ $order->o_sum }}</div>
                        <div class="d-td">{{ $order->p_sum }}</div>
                        <div class="d-td"><form method="post" action="{{url('Admin/ordersUpd')}}">@csrf
                                <input type="hidden" name="o_id" value="{{$order->o_id}}"><select name="o_status"  required>
                                    @foreach($statuses as $status)
                                        <option @if ($status->st_id==$order->o_status)selected @endif value="{{ $status->st_id }}">{{ $status->st_name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit">Сохр!</button></form></div>
                    </div>
                @endforeach
            </div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')