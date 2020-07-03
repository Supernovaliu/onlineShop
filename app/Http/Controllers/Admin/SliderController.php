<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// slider management controller
class SliderController extends Controller
{
    // slider management home page
    public function index(Request $request){
    	// pagination
    	$tot=\DB::table("slider")->count();
    	$data=\DB::table("slider")->paginate(10);

        return view("admin.sys.slider.index")->with('tot',$tot)->with("data",$data);

    }

    // add slider information to database
    public function store(Request $request){

    	$arr=$request->except('_token');

    	// form validation rules
    	$rules=[
    	    'title' => 'required',
    	    'href' => 'required',
    	    'orders' => 'required',
    	    'img' => 'required',

    	];


    	// form validation hint
    	$message=[

    	    "title.required"=>"please enter title",
    	    "href.required"=>"please enter href",
    	    "orders.required"=>"please enter order",
    	    "img.required"=>"please choose picture",

    	];

    	//call for validator
    	$validator = \Validator::make($arr,$rules,$message);

    	// start validation
    	if ($validator->passes()) {

    	    // insert into database
    	    if (\DB::table("slider")->insert($arr)) {


    	       	return redirect('/admin/sys/slider');
    	    }else{
    	        return back();
    	    }

    	}else{

    	    return back()->withInput()->withErrors($validator);
    	}

    }

}
