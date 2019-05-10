<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\Auth;
use App\Service;
use Illuminate\Database\Console\Seeds\SeedCommand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Cart;
use App\Category;
use App\Pay;
use App\Status;
use Validator;
use Illuminate\Support\Facades\Input;

class OrdersController extends Controller
{
    public function orderInsert(Request $request){
        if (isset(Auth::user()->id)) {
            $validator = Validator::make($request->all(), [
                'o_sum' => 'required|numeric|min:1',
                'o_pay' => 'same:o_sum',
                'o_count' => 'required|numeric|min:1',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput(Input::all())->withErrors($validator->messages());
            } else {
                $pay = new Pay;
                $pay->p_sum = $request->input('o_pay');
                $pay->save();

                $userOrder = new Order;
                $userOrder->o_count = $request->input('o_count');
                $userOrder->o_pay = $pay->id;
                $userOrder->o_service = $request->input('o_service');
                $userOrder->o_sum = $request->input('o_sum');
                $userOrder->o_user = Auth::user()->id;
                $userOrder->o_status = '1';
                $userOrder->save();
                if ($request->input('c_id')!=='') Cart::where('c_id', '=',$request->input('c_id'))->delete();
                return redirect()->action('Site\OrdersController@ordersView')->with('flash_message', 'Товар успешно заказан!');
            }
        } else return redirect()->action('Auth\LoginController@showLoginForm')->with('flash_message', 'Необходимо авторизоваться');
    }

    public function orderAdd($c_id)
    {
        $params = Cart::getCart()->where('c_id', '=', $c_id)->first();
        $data = [
            'title' => 'Создание заказа',
            'description' => 'Создание заказа',
            'categories' => Category::all(),
            'services' => Service::servicesAll(),
            'cartCount' => Cart::getCount(),
            'orderParams' => $params,
            'o_count' => $params->c_count,
            'o_sum' =>$params->c_count*$params->s_cost
        ];

        return view('site.orderAdd', $data);
    }

    public function orderAddWithoutParams(Request $request)
    {
        if($request->input('s_id') == '') $s_id=old('s_id'); else $s_id=$request->input('s_id');
        if($request->input('count') == '') $count=old('count'); else $count=$request->input('count');
        $params = Service::serviceGetById($s_id)->get()->first();
        $data = [
            'title' => 'Создание заказа',
            'description' => 'Создание заказа',
            'categories' => Category::all(),
            'services' => Service::servicesAll(),
            'cartCount' => Cart::getCount(),
            'orderParams' => $params,
            'o_count' => $count,
            'o_sum' => $count*$params->s_cost
        ];

        return view('site.orderAdd', $data);
    }

    public function ordersView()
    {
        if (isset(Auth::user()->id)) {
            $data = [
                'title' => 'Перечень заказов',
                'description' => 'Перечень заказов',
                'categories' => Category::all(),
                'services' => Service::servicesAll(),
                'cartCount' => Cart::getCount(),
                'orders' => Order::getOrders()
            ];

            return view('site.orders', $data);
        }  else return redirect()->action('Auth\LoginController@showLoginForm')->with('flash_message', 'Необходимо авторизоваться');
    }
}
