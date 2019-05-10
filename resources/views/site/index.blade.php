@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('site.layouts.categories',['categories' => $categories])
        </div>
        <div id="content" class="float_r">
        	<div id="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <img src="{{ asset('site/images/slider/02.jpg') }}" alt="" />
                    <a href="#"><img src="{{ asset('site/images/slider/01.jpg') }}" alt="" title="Работы профессионалов" /></a>
                    <img src="{{ asset('site/images/slider/03.jpg') }}" alt="" />
                    <img src="{{ asset('site/images/slider/04.jpg') }}" alt="" title="#htmlcaption" />
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>Закажи услугу - не пожалеешь!</strong></a>
                </div>
            </div>

            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        	<h1>Наши услуги</h1>
            @include('site.layouts.serviceList',['services' => $services])

        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')