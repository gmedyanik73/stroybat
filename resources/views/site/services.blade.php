@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('site.layouts.categories',['categories' => $categories])
        </div>
        <div id="content" class="float_r">
        	<h1>{{$description}}</h1>
            @include('site.layouts.serviceList',['services' => $services])

        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')