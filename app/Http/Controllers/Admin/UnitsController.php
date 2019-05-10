<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\User;
use App\Category;
use App\Cart;
use Validator;

class UnitsController extends Controller
{
    public function unitAddShow(){
        $data = [
            'title' => 'Добавить у.е.',
            'description' => 'Добавление условной единицы',
            'categories' => Category::all(),
            'cartCount' => Cart::getCount()
        ];
        return view('admin.unitAdd', $data);
    }

    public function unitAdd(Request $request){
        $validator = Validator::make($request->all(), [
            'unit_name' => 'required|min:1',
        ]);
        if ($validator->fails()) {
            return redirect()->action('UnitsController@unitAddShow')->withErrors($validator->messages());
        }
        else {
            $unit = new Unit;
            $unit->unit_name = $request->input('unit_name');
            $unit->save();
            return redirect()->action('Admin\ServicesController@serviceAddShow');
        }
    }
}
