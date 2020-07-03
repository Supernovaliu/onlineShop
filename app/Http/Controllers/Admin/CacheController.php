<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    public function index(Request $request){

        // $data=\DB::table("user")->get();

        // 写入缓存

        // \Cache::put("data",$data,1);

        // 读取缓存

        // $data=\Cache::get('data');

        // 删除缓存
        // \Cache::forget('data');

        // dd($data);

        // 删除所有缓存

        \Cache::flush();

    }
}
