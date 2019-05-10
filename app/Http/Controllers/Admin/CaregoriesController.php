<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Category;
use App\Cart;

class CaregoriesController extends Controller
{

    public function index(){
        $data = [
            'title' => 'Наша компания',
            'description' => 'Наша компания - самая лучшая в своём роде',
            'categories' => Category::all(),
            'cartCount' => Cart::getCount()
        ];
        return view('admin.categories', $data);
    }

    public function categoryAddShow(){
        $data = [
            'title' => 'Наша компания',
            'description' => 'Наша компания - самая лучшая в своём роде',
            'categories' => Category::all(),
            'cartCount' => Cart::getCount()
        ];
        return view('admin.categoriesAdd', $data);
    }

    public function categoryAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'cat_description' => 'required|max:255',
            'cat_name' => 'required|min:1',
        ]);
        if ($validator->fails()) {
            return redirect()->action('Admin\CaregoriesController@categoryAddShow')->withErrors($validator->messages());
        }
        else {
            $category = new Category;
            $category->cat_description = $request->input('cat_description');
            $category->cat_name = $request->input('cat_name');
            $category->save();
            return redirect()->action('Admin\CaregoriesController@index');
        }
    }

    public function categoryDelete($cat_id){

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
        Category::where('cat_id','=' ,$cat_id)->delete();
        return redirect()->action('Admin\CaregoriesController@index');
    }
}
