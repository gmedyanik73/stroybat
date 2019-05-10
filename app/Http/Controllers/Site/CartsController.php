<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Service;
use App\Category;
use Validator;

class CartsController extends Controller
{
    public function cartInsert($s_id){
        if (isset(Auth::user()->id)) {
            $userCart = new Cart;
            $userCart->c_service = $s_id;
            $userCart->c_user = Auth::user()->id;
            $userCart->c_count = '1';
            $userCart->save();
            return redirect()->back()->with('flash_message', 'Товар успешно добавлен в корзину');
        } else return redirect()->action('Auth\LoginController@showLoginForm')->with('flash_message','Для добавления товара в корзину необходимо авторизоваться');
    }

    public function cartInsertWithCount(Request $request){
        $validator = Validator::make($request->all(), [
            's_id' => 'required|numeric|min:1"',
            'count' => 'required|numeric|min:1"',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        } else {
            if (isset(Auth::user()->id)) {
                $userCart = new Cart;
                $userCart->c_service = $request->input('s_id');
                $userCart->c_user = Auth::user()->id;
                $userCart->c_count = $request->input('count');;
                $userCart->save();
                return redirect()->back()->with('flash_message', 'Товар успешно добавлен в корзину');
            } else return redirect()->action('Auth\LoginController@showLoginForm')->with('flash_message', 'Для добавления товара в корзину необходимо авторизоваться');
        }
    }

    public function cartShow(){
        if (isset(Auth::user()->id)) {
            $data = [
                'title' => 'Корзина',
                'description' => 'Корзина',
                'categories' => Category::all(),
                'services' => Service::servicesAll(),
                'cartCount' => Cart::getCount(),
                'carts' => Cart::getCart()
            ];

            return view('site.cart', $data);
        } else return redirect()->action('Auth\LoginController@showLoginForm')->with('flash_message', 'Необходимо авторизоваться');
    }

    public function cartDelete($c_id){

        /*$validator = Validator::make($s_id, [
            's_category' => 'required|integer',
            's_cost' => 'required|numeric',
            's_description' => 'required|max:255',
            's_image' => 'required|image',
            's_name' => 'required|min:4',
            's_unit' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->action('Admin\ServicesController@index')->withErrors($validator->messages());
        }*/
        Cart::where('c_id','=' ,$c_id)->delete();
        return redirect()->action('Site\CartsController@cartShow');
    }
}
