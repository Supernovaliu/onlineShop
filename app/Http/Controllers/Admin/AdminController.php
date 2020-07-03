<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;



use App\Http\Controllers\Controller;

// administrator page controller
class AdminController extends Controller
{
    // administrator management home page

    public function index(){

        // total records
        $tot=\DB::table('admin')->count();
    	// loading page
        $admin = \DB::table('admin')->paginate(10);


    	return view("admin.admin.index")->with('data',$admin)->with('tot',$tot);

    }

    public function store(){

        // make string to array
        parse_str($_POST['str'],$arr);

        // form validation rule
        $rules=[
            'name' => 'required|unique:admin|between:6,12',
            'pass' => 'required|same:repass|between:6,12',

        ];


        // form validation hint
        $message=[

            "name.required"=>"please enter user name",
            "pass.required"=>"please enter password",
            "name.unique"=>"user name already exist",
            "pass.same"=>"password inconsistent",
            "pass.between"=>"password length not between 6-12 characters",
            "name.between"=>"user name not between 6-12 characters",

        ];

        // use form validation
        $validator = \Validator::make($arr,$rules,$message);

        // start validating
        if ($validator->passes()) {

            // when validation passed then add to database
            unset($arr['repass']);

            $arr['pass']=\Crypt::encrypt($arr['pass']);

            $arr['time']=time();

            // insert to database
            if (\DB::table("admin")->insert($arr)) {
                return 1;
            }else{
                return 0;
            }

        }else{

            return $validator->getMessageBag()->getMessages();
        }

    }

    // edit page
    public function edit($id){


        // query database
        $data=\DB::table("admin")->find($id);


        $data->pass=\Crypt::decrypt($data->pass);

        return view('admin.admin.edit')->with("data",$data);
    }



    public function update(){

        parse_str($_POST['str'],$arr);

        // form validation rule
        $rules=[
            'pass' => 'required|same:repass|between:6,12',

        ];


        //form validation hint
        $message=[

            "pass.required"=>"please enter password",
            "pass.same"=>"password inconsistent",
            "pass.between"=>"password length not between 6-12 characters",

        ];


        $validator = \Validator::make($arr,$rules,$message);

        if ($validator->passes()) {

            unset($arr['repass']);

            $arr['pass']=\Crypt::encrypt($arr['pass']);


            if (\DB::update("update admin set status= $arr[status] ,pass='$arr[pass]' where id=$arr[id]")) {
                return 1;
            }else{
                return 0;
            }

        }else{

            return $validator->getMessageBag()->getMessages();
        }
    }

    // delete
    public function destroy($id){

        // delete data

        if (\DB::table("admin")->delete($id)) {
            return "1";
        }else{
            return 0;
        }
    }

    // edit status
    public function ajaxStatu(Request $request){

        // remove data
        $arr=$request->except('_token');

        if (\DB::update("update admin set status= $arr[status] where id=$arr[id]")) {

            return 1;
        }else{
            return 0;
        }
    }
}
