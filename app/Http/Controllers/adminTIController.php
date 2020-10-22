<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\admintiModel;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Redirect;

class adminTIController extends Controller
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
    public function show_ti()
    {   
        $allti=admintiModel::orderby('idtienich','desc')->get();
        return View('admin.show_ti')->with('allti',$allti);
    }
    public function form_add_ti()
    {   
        return View('admin.add_ti');
    }
    public function save_ti(Request $request)
    {   
        $tienich= new admintiModel;
        $tienich->tentienich=$request->tentienich;
        $tienich->save();
        return Redirect::to('/show-ti');

    }
    public function edit_ti(Request $request)
    {   $data=array();
        $x=DB::table('tbl_tienich')->where('tentienich',$request->idtii)->get();
        if(count($x)>0)
        {
            $mes=array("mes"=>"tên trùng");
            return json_encode($mes);
        }
        else
        {
            $data['tentienich']=$request->idtii;

            admintiModel::where('idtienich',$request->idti)->update($data);
            $tienich=admintiModel::where('idtienich',$request->idti)->get();
            return json_encode($tienich);
        }
       
    }
    public function delete_ti(Request $request)  
    {   
        $id=$request->idti;
       
        $a= DB::table('tbl_ti_bd')->where('idtienich',$id)->get();
        if(isset($a))
        {
        DB::table('tbl_ti_bd')->where('idtienich',$id)->delete();   
        admintiModel::where('idtienich',$id)->delete();
        $data=admintiModel::orderby('idtienich','desc')->get();
        return json_encode($data);
        }
    }
    public function kt_ti(Request $request)  
    {   
        $x=DB::table('tbl_tienich')->where('tentienich',$request->tenti)->get();
        if(count($x)>0)
        {
            $mes=array("mes"=>"tên tiện ích bị trùng");
            return json_encode($mes);
        }
        else
        {
            $mes=array("khanh"=>"thanh cong");
            return json_encode($mes);
        }
    }
}
