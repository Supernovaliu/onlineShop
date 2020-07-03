<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类

use App\Http\Controllers\Controller;

// types controller
class TypesController extends Controller
{

    public function data($pid=0){

        // query database
        $data=\DB::table("types")->where("pid",$pid)->get();

        // query next type
        foreach ($data as $key => $value) {

            $value->zi=$this->data($value->id);
        }

        return $data;
    }

    public function data1($data,$pid=0){

        $newArr=array();
        // get top type
        foreach ($data as $key => $value) {

            if ($value->pid==$pid) {

                $newArr[$value->id]=$value;

                $newArr[$value->id]->zi=$this->data1($data,$value->id);
            }
        }

        return $newArr;
    }
    // types management home page
    public function index(){
        // 一、使用面向过程方式实现 (淘汰)

        // 遍历所有的顶级分类

        $one=\DB::table("types")->where("pid",0)->get();

        // 遍历one的孩子

        foreach ($one as $value) {
            # code...

            $value->zi=\DB::table("types")->where("pid",$value->id)->get();
        }

        // 遍历三级分类

        foreach ($one as $value) {

            foreach ($value->zi as $v) {

                $v->zi=\DB::table("types")->where("pid",$v->id)->get();
            }
        }
            $arr=$this->data();

        // 三、使用递归实现数据格式化

            $data=\DB::table("types")->get();

            $arr=$this->data1($data,$pid=0);

        // 四、实现树形结构


            $data=\DB::select("select types.*,concat(path,id) p from types order by p");



        // 查询数据

        // $data=\DB::table("types")->orderBy("sort",'desc')->get();

    	// 加载页面

    	return view("admin.types.index")->with("data",$data);

    }

    // 添加页面 admin/types/create  get

    public function create(){


    	return view('admin.types.add');
    }

    // insert  admin/types  post
    public function store(Request $request){

        // process request
        $data=$request->except("_token");

        // insert into database
        if (\DB::table('types')->insert($data)) {
            // insert successfully go to home page
            return redirect('admin/types');
        }else{
            // add failed return back
            return back();
        }
    }

    // edit admin/types/{admin}/edit get
    public function edit(){
    	return view('admin.types.edit');

    }


    // update admin/types/{admin}  put
    public function update(){

    }

    // admin/types/{admin}   delete
    public function destroy($id){

        // delete
        if(\DB::delete("delete from types where id=$id or path like '%,$id,%'")){
            return  "1";
        }else{
            return  "0";
        }
    }
}
