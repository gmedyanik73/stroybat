<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Service;
use Validator;
use App\Cart;

class CategoriesController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Категории',
            'description' => 'Перечень всех категорий',
            'categories' => Category::all(),
            'cartCount' => Cart::getCount()
        ];
        return view('site.categories', $data);
    }
}
