<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$title}}</title>
    @include('site.layouts.styles')
    @include('site.layouts.scripts')

</head>
<body>

<div id="templatemo_body_wrapper">
    <div id="templatemo_wrapper">

        <div id="templatemo_header">
            <div id="site_title"><h1><a href="#">Строительная компания</a></h1></div>
            <div id="header_right">
                <p>
                    @if (isset(Auth::user()->id)) <a href="{{url('Account')}}">Здравствуйте, {{Auth::user()->login}}</a> | <a href="{{url('Orders')}}">Мои заказы</a> | <a href="{{url('logout')}}">Выход</a> | @else <a href="{{url('login')}}">Войти!</a> | <a href="{{url('registration')}}">Зарегистрироваться</a></p> @endif
                <p>
                    @if (isset(Auth::user()->id)) В корзине: <strong>{{$cartCount}}</strong> ( <a href="{{url('Cart')}}">Перейти в корзину</a> ) @endif
                </p>
            </div>
            <div class="cleaner"></div>
        </div> <!-- END of templatemo_header -->

        <div id="templatemo_menubar">
            <div id="top_nav" class="ddsmoothmenu">
                <ul>
                    <li><a href="{{ url('Index') }}" class="selected">Главная</a></li>
                    <li><a href="{{ url('Categories') }}">Категории</a>
                        <ul>
                            @foreach($categories as $cat)
                                <li><a href="{{ url('Category/'.$cat->cat_id) }}">{{ $cat->cat_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ url('About') }}">О нас</a></li>
                    <li><a href="{{ url('Contact') }}">Контакты</a></li>
                    @if (isset(Auth::user()->id) && Auth::user()->role==2)<li><a href="{{ url('Admin') }}">Админочка</a></li>@endif
                </ul>
                <br style="clear: left" />
            </div> <!-- end of ddsmoothmenu -->
            <div id="templatemo_search">
                <form method="GET" action="{{ url('ServiceFind') }}" aria-label="{{ __('Service Find') }}">
                    <input type="text" name="s_name" id="s_name" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                    <input type="submit" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
        </div> <!-- END of templatemo_menubar -->