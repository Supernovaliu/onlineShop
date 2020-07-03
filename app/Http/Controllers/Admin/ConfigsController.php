<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// system management controller
class ConfigsController extends Controller
{
    // system home page
    public function index(Request $request){

        return view("admin.sys.config.index");

    }

    // add new configuration
    public function store(Request $request){
    	// receive old picture
    	$oldLogo=$request->input('oldLogo');

    	$arr=$request->except("_token",'oldLogo');

    	// write into file
    	$str1=var_export($arr,true);

    	$str="<?php

        return ".$str1." ?>";

		// write into specific file
		file_put_contents('../config/web.php', $str);

		if ($oldLogo==$request->input("logo")) {

		}else{
			unlink("./Uploads/sys/".$oldLogo);
		}

		return back();

    }

}
