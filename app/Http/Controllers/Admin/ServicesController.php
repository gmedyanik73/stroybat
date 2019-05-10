<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Category;
use App\Unit;
use App\Cart;
use Validator;

class ServicesController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Управление услугами',
            'description' => 'Админка -> Управление услугами',
            'categories' => Category::all(),
            'services' => Service::servicesGet(),
            'cartCount' => Cart::getCount()
        ];
        return view('admin.services', $data);
    }

    public function serviceAddShow(){
        $data = [
            'title' => 'Добавление услуги',
            'description' => 'Админка -> Добавление услуг',
            'categories' => Category::all(),
            'units' => Unit::all(),
            'cartCount' => Cart::getCount()
        ];
        return view('admin.servicesAdd', $data);
    }

    public function serviceAdd(Request $request){
        $validator = Validator::make($request->all(), [
            's_category' => 'required|integer',
            's_cost' => 'required|numeric',
            's_description' => 'required|max:3000',
            's_image' => 'required|image',
            's_name' => 'required|min:4',
            's_unit' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect()->action('Admin\ServicesController@serviceAddShow')->withErrors($validator->messages());
        }
        else {
            $service = new Service;
            $service->s_category = $request->input('s_category');
            $service->s_cost = $request->input('s_cost');
            $service->s_description = $request->input('s_description');
            $filename = time().'.'.$request->file('s_image')->getClientOriginalName();
            $request->s_image->move(public_path('images'), $filename);
            $service->s_image = $filename;
            $service->s_name = $request->input('s_name');
            $service->s_unit = $request->input('s_unit');
            $service->save();
            return redirect()->action('Admin\ServicesController@index');
        }
    }

    public function serviceDelete($s_id){

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
        Service::where('s_id','=' ,$s_id)->delete();
        return redirect()->action('Admin\ServicesController@index');
    }
}
