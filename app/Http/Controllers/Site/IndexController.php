<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Service;
use App\Cart;
use App\Order;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Строительная компания СтройБАТ',
            'description' => 'Наша компания - самая лучшая в своём роде',
            'categories' => Category::all(),
            'services' => Service::servicesAll(),
            'cartCount' => Cart::getCount()
        ];
        
        return view('site.index', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Контакты',
            'description' => 'Как нас найти?',
            'categories' => Category::all(),
            'services' => Service::servicesAll(),
            'cartCount' => Cart::getCount()
        ];

        return view('site.contact', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'О нас',
            'description' => 'Информация о организации',
            'categories' => Category::all(),
            'services' => Service::servicesAll(),
            'cartCount' => Cart::getCount()
        ];

        return view('site.about', $data);
    }

    public function account()
    {
        $role = Role::where('role_id','=',Auth::user()->role)->first(['role_name']);
        $data = [
            'title' => 'Управление пользователем',
            'description' => 'Управление пользователем',
            'categories' => Category::all(),
            'role' => $role->role_name,
            'cartCount' => Cart::getCount()
        ];

        return view('site.account', $data);
    }

    public function updatePass(Request $request){
        $user = Auth::user();

        $curPassword = $request->input('old_password');
        $newPassword = $request->input('password');
        if (Hash::check($curPassword, $user->password) && $request->input('password') == $request->input('password_confirmation')) {
            $user_id = $user->id;
            $obj_user = User::find($user_id)->first();
            $obj_user->password = Hash::make($newPassword);
            $obj_user->save();

            return redirect()->action('Site\IndexController@account')->withErrors('Пароль успешно изменен');
        }
        else
        {
            return redirect()->action('Site\IndexController@account')->withErrors('Вы неверно ввели текущий пароль, либо не совпадают значения полей нового пароля и его подтверждения');
        }
    }
}
