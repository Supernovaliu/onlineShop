<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// login controller
class LoginController extends Controller
{
    // login home page
    public function index(){

    	return view("admin.login");
    }

    // captcha
    public function yzm(){
    	require_once("../resources/code/Code.class.php");

    	// instantialization
    	$code=new \Code();

    	// generate captcha
    	$code->make();
    }

    // process login request
    public function check(Request $request){

        // get request data
        $name=$request->input('name');
        $pass=$request->input('pass');
        //$ucode=$request->input('code');

        // call captcha generating class
        //require_once("../resources/code/Code.class.php");

        // instancialization captcha class
        //$code=new \Code();

        // get session
        //$ocode=$code->get();

        //validate captcha
        //if (strtoupper($ucode)==$ocode) {

            $data=\DB::table('admin')->where([['name','=',"$name"],['status','=',0]])->first();

            if ($data) {

                if ($pass==\Crypt::decrypt($data->pass)) {

                    $arr=[];

                    $arr['lasttime']=time();
                    $arr['count']=++$data->count;
                    // update login information
                    \DB::table('admin')->where('id',$data->id)->update($arr);
                    // save session
                    session(['onlineShopAdminUserInfo.name'=>$data->name]);
                    session(['onlineShopAdminUserInfo.id'=>$data->id]);

                    // redirect to home page
                    return redirect('admin');
                }else{
                    return back()->with("error",'password is wrong!');

                }
            }else{
                return back()->with("error",'user name invalid');

            }


        //}else{
            //return back()->with("error",'captcha is wrong');
        //}
    }

    // logout
    public function logout(Request $request){
        $request->session()->flush();

        return redirect('admin/login');
    }
}
