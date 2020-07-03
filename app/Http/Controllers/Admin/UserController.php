<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

//user controller
class UserController extends Controller
{
    // user management home page
    public function index(Request $request){

        $search=$request->input('search');

        if ($search) {
            // get data
            $tot=\DB::table("user")->where("tel",'=',$search)->count();

            // pagination
            $data=\DB::table("user")->where("tel",'=',$search)->paginate(10);
        }else{
            // get data
            $tot=\DB::table("user")->count();

            //pagination
            $data=\DB::table("user")->paginate(10);
        }

    	return view("admin.user.index")->with('data',$data)->with("tot",$tot);

    }

}
