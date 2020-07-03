<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;

// common controller
class CommonController extends Controller
{
	// file upload method
	public function upload(Request $request){
		// get ajax request content
		$file=$request->file('Filedata');

		// determine whether the directory exist
		$dir=$request->input('files');

		if (file_exists("./Uploads/{$dir}")) {

		}else{
			mkdir("./Uploads/{$dir}");
		}

		// determine whether the file uploaded is valid
		if ($file->isValid()) {
			// get extension
			$ext=$file->getClientOriginalExtension();

			// generate new file name
			$newFile=time().rand().'.'.$ext;

			// move to specific directory
			$request->file('Filedata')->move('./Uploads/'.$dir,$newFile);

			echo $newFile;
		}
	}
}
