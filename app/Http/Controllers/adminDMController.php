<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\admindmModel;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Redirect;
class adminDMController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function show_dm()
    {   
        $alldm=admindmModel::orderby('iddanhmuc','desc')->get();
        return View('admin.show_dm')->with('alldm',$alldm);
    }
    public function form_add_dm()
    {   
        return View('admin.add_dm');
    }
    public function save_dm(Request $request)
    {   
        $danhmuc= new admindmModel;
        $danhmuc->tendanhmuc=$request->tendanhmuc;
        $danhmuc->save();
        return Redirect::to('/show-dm');

    }
    public function edit_dm(Request $request)
    { 
        $data=array();
        $x=DB::table('tbl_danhmuc')->where('tendanhmuc',$request->tendm)->get();
        if(count($x)>0)
        {
            $mes=array("mes"=>"tên trùng");
            return json_encode($mes);
        }
        else
        {
            $data=array();
            $data['tendanhmuc']=$request->tendm;
            admindmModel::where('iddanhmuc',$request->iddm)->update($data);
            $danhmuc=admindmModel::where('iddanhmuc',$request->iddm)->get();
            return json_encode($danhmuc);
        }
          
    }
    public function delete_dm(Request $request)  
    {   
        $pass=$request->passwordadmin;
        $id=$request->iddm;
        $a= DB::table('tbl_admin')->get();
        if($pass==$a[0]->passwordadmin)
        {
            DB::table('tbl_danhmuc')->where('iddanhmuc',$id)->delete();
            $data= DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get();
            return json_encode($data);
        }
        else
        {
            $mes=array('mes'=>'Bạn đã nhập mật khẩu sai');
            return json_encode($mes);
        }
    }
    public function kt_dm(Request $request)  
    {   
        
        $x=DB::table('tbl_danhmuc')->where('tendanhmuc',$request->tendm)->get();
        if(count($x)>0)
        {
            $mes=array("mes"=>"tên danh mục bị trùng");
            return json_encode($mes);
        }
        else
        {
            $mes=array("khanh"=>"thanh cong");
            return json_encode($mes);
        }
    }
}
