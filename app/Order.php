<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public static function getOrders(){
        return DB::table('services')->join('orders', 's_id','=','o_service')->join('pays', 'o_pay', '=','p_id')->join('statuses', 'o_status', '=','st_id')->where('o_user', '=', Auth::user()->id)->get();
    }
}
