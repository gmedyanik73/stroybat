@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('site.layouts.categories',['categories' => $categories])
        </div>
        <div id="content" class="float_r">
            <h1>{{$description}}</h1>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A8c7d24688aa7a57ba5c7db25c99c4178610f79f4f3dfb512e6134352d6a75faf&amp;width=600&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
            <div><h4>Адрес: г. Ульяновск, пр-кт Созидателей, 13А</h4></div>
            <div><h4>Контактный телефон: 8(800)2000-600</h4></div>
            <div><h4>Email: buy@stroybat.ru</h4></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')