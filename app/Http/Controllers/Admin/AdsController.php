<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// ads management controller
class AdsController extends Controller
{
    // ads management home page
    public function index(Request $request){

    	// query data
    	$data=\DB::table("ads")->orderBy("sort",'desc')->paginate(10);

    	// load page
    	return view("admin.sys.ads.index")->with("data",$data);

    }

    // add ads method
    public function create(){

    	return view("admin.sys.ads.add");
    }

    // add process method
    public function store(Request $request){
    	// except token
    	$arr=$request->except("_token");

    	// insert into database
    	if (\DB::table("ads")->insert($arr)) {
    		return redirect("admin/sys/ads");
    	}else{
    		return back();
    	}
    }

}
