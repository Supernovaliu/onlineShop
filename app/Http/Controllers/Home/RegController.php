<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;

// registration controller
class RegController extends Controller
{
    // register page
    public function index(){


        return view("home.reg");

    }

    // captcha
    public function yzm(){
        require_once("../resources/code/Code.class.php");

        // instantialize
        $code=new \Code();

        // generate captcha
        $code->make();
    }

    // check request
    public function check(Request $request){



        // receive data
        $arr=$request->except("_token");

        // check captcha
        require_once("../resources/code/Code.class.php");

        $code=new \Code();

        // get session
        $ocode=$code->get();

        // check captcha
        if (strtoupper($arr['code'])==$ocode) {
            // check password length
            if (strlen($arr['pass'])>=6 && strlen($arr['pass'])<=12) {
                // check email address format
                if (preg_match('/\w+@\w+\.\w+/',$arr['email'])) {
                    // check if email registered
                    $a=\DB::table("user")->where("email","=","$arr[email]")->first();

                    if ($a) {
                        return back()->with("error","this email has been registered");
                    }else{

                        // check if password equal
                        if ($arr['pass']==$arr['repass']) {

                            $data=array();

                            $data['email']=$arr['email'];

                            $email=$arr['email'];
                            $data['time']=time();
                            $data['status']=0;
                            $data['token']=Str::random(50);
                            $data['pass']=\Crypt::encrypt($arr['pass']);


                            //send email
                            if ($id=\DB::table("user")->insertGetID($data)) {
                                \Mail::send('mail.index',["id"=>$id,"token"=>$data['token']],function($message) use($email){
                                    $message->to($email);
                                    $message->subject("register successfully");
                                });

                                // load activate page
                                $mailArr=explode( "@",$email);
                                $href="mail.".$mailArr[1];
                                return view("home.activate")->with("href",$href);
                            }else{
                                return back()->with("error","register failed");

                            }
                        }else{


                            return back()->with("error","password not insistent");

                        }

                    }
                }else{
                    return back()->with("error","email is wrong");

                }
            }else{
                return back()->with("error","password length is wrong");

            }
        }else{
            return back()->with("error","captcha is wrong");
        }
    }

    // activate account
    public function activate($id,$token){

        // check if user exist
        $data=\DB::table("user")->where("id",$id)->first();

        // check token
        if ($token==$data->token) {

            $arr=array();

            $arr['status']=1;
            $arr["token"]=Str::random(50);

            // edit status and jump to login page
            if(\DB::table("user")->where("id",$id)->update($arr)){
                return redirect("/login");
            }

        }else{
            echo "token is overdue";
        }

    }
}
