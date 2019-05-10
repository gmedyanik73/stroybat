<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\Unit;
use App\Cart;
use Validator;
use App\Order;
use App\Status;

class OrdersController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Управление услугами',
            'description' => 'Админка -> Управление услугами',
            'categories' => Category::all(),
            'services' => Service::servicesGet(),
            'cartCount' => Cart::getCount(),
            'orders' => Order::getOrders(),
            'statuses' => Status::all()
        ];
        return view('admin.orders', $data);
    }

    public function update(Request $request){
        Order::where('o_id','=' ,$request->input('o_id'))->update(['o_status' => $request->input('o_status')]);
        $data = [
            'title' => 'Управление услугами',
            'description' => 'Админка -> Управление услугами',
            'categories' => Category::all(),
            'services' => Service::servicesGet(),
            'cartCount' => Cart::getCount(),
            'orders' => Order::getOrders(),
            'statuses' => Status::all()
        ];
        return redirect()->back();
    }
}
