<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// types ads controller
class TypesAdsController extends Controller
{
    // types ads management home page
    public function index(Request $request){

    	$data=\DB::table("typesads")->select("typesads.*","types.name")->join("types","types.id",'=','typesads.cid')->paginate(5);

        return view("admin.sys.types.index")->with("data",$data);

    }

    // add page
    public  function create(){
    	$data=\DB::table("types")->where("pid",0)->get();
    	return view("admin.sys.types.add")->with('data',$data);
    }

    // add to database
    public function store(Request $request){

    	$arr=$request->except("_token");

    	// insert into database
    	if (\DB::table("typesads")->insert($arr)) {

    		return redirect("admin/sys/types");
    	}else{
    		return back();
    	}
    }

}
