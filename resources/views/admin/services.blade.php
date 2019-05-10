@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r customForm">
        	<h1>Редактирование услуг</h1>
            <a href="serviceAdd">Добавить услугу</a>
            <div class="d-table">
                <div class="d-tr">
                    <div class="d-td">Изображение</div>
                    <div class="d-td">Наименование</div>
                    <div class="d-td">Описание</div>
                    <div class="d-td">Цена(руб)</div>
                    <div class="d-td">Ед.изм.</div>
                    <div class="d-td">Категория</div>
                    <div class="d-td">Действие</div>
                </div>
                @foreach ($services as $service)
                <div class="d-tr">
                    <div class="d-td"><img src="{{ URL::to('/images').'/'.$service->s_image }}" width="100"></div>
                    <div class="d-td">{{ $service->s_name }}</div>
                    <div class="d-td">{{ $service->s_description }}</div>
                    <div class="d-td">{{ $service->s_cost }}</div>
                    <div class="d-td">{{ $service->unit_name }}</div>
                    <div class="d-td">{{ $service->cat_name }}</div>
                    <div class="d-td"><a href="serviceDelete/{{$service->s_id}}">Удалить</a></div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')