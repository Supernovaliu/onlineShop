<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

// login controller
class LoginController extends Controller
{
    // login page
    public function index(){

        // get previous page
        session(['prevPage'=>$_SERVER['HTTP_REFERER']]);

        // login page
        return view("home.login");
    }

    // process login
    public function check(Request $request){

        // receive data
        $email=$request->input("email");
        $pass=$request->input("pass");

        // check email
        $data=\DB::table("user")->where("email","$email")->first();

        if ($data) {
            // check password
            if ($pass==\Crypt::decrypt($data->pass)) {

                session(['onlineShopHomeUserInfo.email'=>$data->email]);
                session(['onlineShopHomeUserInfo.name'=>$data->name]);
                session(['onlineShopHomeUserInfo.id'=>$data->id]);

                return redirect(session('prevPage'));
            }else{
                return back();
            }
        }else{
            return back();
        }
    }
    // logout
    public function logout(Request $request){
        $request->session()->flush();
        //return previous page
        return redirect('/');
    }

    // recover password
    public function recover(){

        if ($_POST) {

            // receive data
            $email=$_POST['email'];

            // query data
            $data=\DB::table("user")->where("email","$email")->first();

            if ($data) {

                \Mail::send('mail.zh',["id"=>$data->id,"token"=>$data->token],function($message) use($email){
                    $message->to($email);
                    $message->subject("recover password");
                });

                $mailArr=explode( "@",$email);
                $href="mail.".$mailArr[1];

                return view("home.recoverPrompt")->with("href",$href);
            }else{
                return back();
            }
        }else{
            return view("home.recover");
        }


    }

    // edit password
    public function savePass($id,$token){

        if ($_POST) {
            // check input password
            if ($_POST['pass']==$_POST['repass']) {

                // check password length
                if (strlen($_POST['pass'])>=6 && strlen($_POST['pass'])<=12) {
                    //edit information
                    $data=array();

                    $data['token']=Str::random(50);
                    $data['pass']=\Crypt::encrypt($_POST['pass']);

                    if (\DB::table("user")->where("id",$id)->update($data)) {
                        return redirect("/login");
                    }else{
                        return back();
                    }

                }else{
                    return back();
                }
            }else{
                return back();
            }
        }else{
            return  view("home.savePass");

        }

    }
}
