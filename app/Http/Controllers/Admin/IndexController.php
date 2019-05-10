<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Cart;

class IndexController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Наша компания',
            'description' => 'Наша компания - самая лучшая в своём роде',
            'categories' => Category::all(),
            'cartCount' => Cart::getCount()
        ];
        return view('admin.index', $data);
    }
}
