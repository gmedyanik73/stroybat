@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r customForm">
        	<h1>Редактирование категорий</h1>
            <a href="categoryAdd">Добавить категорию</a>
            <div class="d-table">
                <div class="d-tr">
                    <div class="d-td"><b>Наименование</b></div>
                    <div class="d-td"><b>Описание</b></div>
                    <div class="d-td"><b>Действие</b></div>
                </div>
                @foreach ($categories as $category)
                    <div class="d-tr">
                        <div class="d-td">{{ $category->cat_name }}</div>
                        <div class="d-td">{{ $category->cat_description }}</div>
                        <div class="d-td"><a href="categoryDelete/{{$category->cat_id}}">Удалить</a></div>
                    </div>
                @endforeach
            </div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')