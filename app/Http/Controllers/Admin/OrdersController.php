<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// order management controller
class OrdersController extends Controller
{
    // order management home page
    public function index(Request $request){

        // query order information
        $data=\DB::table("orders")->select("orders.*","user.name","orderstatu.name as ssname")
                ->join("user","user.id","=","orders.uid")
                ->join("orderstatu","orders.sid",'=',"orderstatu.id")
                ->get();


        $newArr=array();
        foreach ($data as $key => $value) {

            $newArr[$value->code]=$value;
        }

        return view("admin.orders.index")->with('data',$newArr);

    }

    // order list
    public function lists(Request $request){

        // get order number
        $code=$request->input("code");

        // query goods from order number
        $data=\DB::table("orders")->select("orders.*","goods.title","goods.img")->join("goods","goods.id","=","orders.gid")->where("code",$code)->get();

        // display data to list page
        return view("admin.orders.lists")->with("data",$data);

    }

    // address
    public function addr(){
        // query data
        $id=$_GET['id'];

        // query shipping address information
        $data=\DB::table("addr")->find($id);

        return view("admin.orders.addr")->with("data",$data);
    }

    // edit order status
    public function edit(Request $request){

        if ($_POST) {

            $sid=$request->input("sid");
            $code=$request->input("code");

            $sql="update orders set sid=$sid where code='$code'";

            if (\DB::update($sql)) {

                return redirect("admin/orders");
            }else{
                return back();
            }
        }else{

            $data=\DB::table("orderstatu")->get();

            return view("admin.orders.edit")->with("data",$data);
        }



    }

    // status list
    public function statuList(){
        // query data
        $data=\DB::table('orderstatu')->get();

        return view("admin.orders.statuList")->with("data",$data);
    }

    // edit order status
    public function statuEdit(Request $request){

        $name=$request->input('name');
        $id=$request->input('id');

        $sql="update orderstatu set name='$name' where id=$id";

        if (\DB::update($sql)) {

            return 1;
        }else{
            return 0;
        }
    }

}
