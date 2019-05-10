<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Unit;
use App\Category;
use App\Cart;
use Validator;

class ServicesController extends Controller
{
    public function servicesCategoryGet($cat_id){
        $descr = Category::where('cat_id', '=', $cat_id)->get(['cat_name'])->first();
        $data = [
            'title' => 'Категории',
            'categories' => Category::all(),
            'services' => Service::servicesGetByCat($cat_id),
            'description' => 'Перечень услуг категории '.$descr->cat_name,
            'cartCount' => Cart::getCount()
        ];
        return view('site.services', $data);
    }

    public function servicesNameFind(Request $request){
        $s_name = $request->input('s_name');
        $data = [
            'title' => 'Категории',
            'description' => 'Перечень всех категорий с именем '.$s_name,
            'categories' => Category::all(),
            'services' => Service::servicesGetByName($s_name),
            'cartCount' => Cart::getCount()
        ];
        return view('site.services', $data);
    }

    public function serviceView($s_id){
        $data = [
            'title' => 'Просморт услуги'.$s_id,
            'description' => 'Услуга ',
            'categories' => Category::all(),
            'service' => Service::serviceGetById($s_id)->first(),
            'cartCount' => Cart::getCount()
        ];
        return view('site.serviceView', $data);
    }
}
