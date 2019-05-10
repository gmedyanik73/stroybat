@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
        @include('site.layouts.categories',['categories' => $categories])
        <div id="content" class="float_r">
            <ul>
                @foreach($categories as $cat)
                    <li><a href="{{ url('Category/'.$cat->cat_id) }}">{{ $cat->cat_name }}</a> - {{ $cat->cat_description }}</li>
                @endforeach
            </ul>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')