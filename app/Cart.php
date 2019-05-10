<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    public static function getCount(){
        if (isset(Auth::user()->id))
            return DB::table('carts')->join('services','s_id', '=','c_service')->where('c_user', '=', Auth::user()->id)->count();
        else
            return 0;
    }

    public static function getCart(){
        return DB::table('services')->join('units', 's_unit','=','unit_id')->join('carts', 's_id', '=','c_service')->where('c_user', '=', Auth::user()->id)->get();
    }
}
