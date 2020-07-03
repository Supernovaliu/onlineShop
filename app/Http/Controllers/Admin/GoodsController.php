<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// goods management controller
class GoodsController extends Controller
{
    // goods management home page
    public function index(Request $request){

        // pagination
        $data=\DB::table("goods")->orderBy("id","desc")->paginate(10);



        // display description image
        foreach ($data as $key => $value) {

            $value->limg=\DB::table("goodsimg")->where("gid",$value->id)->get();
        }

        return view("admin.goods.index")->with("data",$data);

    }

    // add goods page
    public function create(){

        // query goods category
        $data=\DB::select("select types.*,concat(path,id) p from types order by p");

        // display goods category
        foreach ($data as $key => $value) {

            $arr=explode(',', $value->path);

            $size=count($arr);

            $value->size=$size-2;

            $value->html=str_repeat('|----', $size-2).$value->name;
        }

        return view('admin.goods.add')->with("data",$data);
    }

    // add goods method
    public function store(Request $request){
        // get images
        $imgs=$request->input("imgs");

        // except unnecessary parameter
        $data=$request->except("_token","imgs");



        // insert into database
        if ($id=\DB::table("goods")->insertGetId($data)) {

            // process multiple description images
            $arr=explode(',', $imgs);

            foreach ($arr as $key => $value) {
                $brr=array();

                $brr['gid']=$id;
                $brr['img']=$value;

                \DB::table("goodsimg")->insert($brr);
            }

            return redirect('admin/goods');
        }else{
            return back();
        }
    }
}
