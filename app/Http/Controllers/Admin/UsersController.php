<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Cart;
use App\Role;

class UsersController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Пользователи',
            'description' => 'Пользователи сайта',
            'categories' => Category::all(),
            'users' => User::usersGet(),
            'cartCount' => Cart::getCount()
        ];
        return view('admin.users', $data);
    }

    public function userRoleUpdShow($id){
        $data = [
            'title' => 'Редактирование пользователя'.$id,
            'description' => 'Редактирование пользователя'.$id,
            'categories' => Category::all(),
            'roles' => Role::all(),
            'id' => $id,
            'cartCount' => Cart::getCount()
        ];
        return view('admin.userRoleUpd', $data);
    }

    public function userDelete($id){
        User::where('id','=' ,$id)->delete();
        return redirect()->action('Admin\UsersController@index');
    }

    public function userRoleUpdate(Request $request){
        User::where('id','=' ,$request->input('id'))->update(['role' => $request->input('role')]);
        return redirect()->action('Admin\UsersController@index');
    }
}
