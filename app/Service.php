<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    public static function servicesGet(){
        return DB::table('services')->join('units', 's_unit','=','unit_id')->join('categories', 's_category', '=','cat_id')->get();//$this->hasMany('App\Models\Unit','unit_id','s_unit');
    }

    public static function servicesGetByCat($cat_id){
        return DB::table('services')->join('units', 's_unit','=','unit_id')->join('categories', 's_category', '=','cat_id')->where('cat_id', '=', $cat_id)->get();//$this->hasMany('App\Models\Unit','unit_id','s_unit');
    }

    public static function servicesGetByName($s_name){
        return DB::table('services')->join('units', 's_unit','=','unit_id')->join('categories', 's_category', '=','cat_id')->where('s_name', 'like', '%'.$s_name.'%')->get();//$this->hasMany('App\Models\Unit','unit_id','s_unit');
    }

    public static function servicesAll(){
        return DB::table('services')->join('units', 's_unit','=','unit_id')->join('categories', 's_category', '=','cat_id')->orderByDesc('s_id')->get();//$this->hasMany('App\Models\Unit','unit_id','s_unit');
    }

    public static function serviceGetById($s_id){
        return DB::table('services')->join('units', 's_unit','=','unit_id')->join('categories', 's_category', '=','cat_id')->where('s_id', '=', $s_id);
    }
}
