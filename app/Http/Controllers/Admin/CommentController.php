<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// comment controller
class CommentController extends Controller
{
    // comment management home page
    public function index(Request $request){

        // related tables query
        $data=\DB::table("comment")
            ->select("comment.*","goods.title",'goods.img as gimg',"user.name")
            ->join("user","user.id",'=','comment.uid')
            ->join("goods","goods.id",'=','comment.gid')
            ->get();

        return view("admin.comment.index")->with("data",$data);
    }

    // use ajax to edit status
    public function ajaxStatu(Request $request){

        $arr=$request->except("_token");

        $sql="update comment set statu=$arr[statu] where id=$arr[id]";

        if (\DB::update($sql)) {

            return 1;
        }else{
            return 0;
        }

    }

}
