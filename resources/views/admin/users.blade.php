@include('site.layouts._layout',['categories' => $categories])

@section('content')
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            @include('admin.layouts.menu')
        </div>
        <div id="content" class="float_r customForm">
        	<h1>Редактирование пользователей</h1>
            <a href="userAdd">Добавить пользователя</a>
            <div class="d-table">
                <div class="d-tr">
                    <div class="d-td">E-mail</div>
                    <div class="d-td">Имя пользователя</div>
                    <div class="d-td">Роль</div>
                    <div class="d-td">Действия</div>
                </div>
                @foreach ($users as $user)
                    <div class="d-tr">
                        <div class="d-td">{{ $user->email }}</div>
                        <div class="d-td">{{ $user->login }}</div>
                        <div class="d-td">{{ $user->role_name }}</div>
                        <div class="d-td"><a href="userDelete/{{$user->id}}">Удалить</a> <br/>
                                            <a href="userRoleUpd/{{$user->id}}">Изм. роль</a></div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->

@show
@include('site.layouts.footer')