<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blModel;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class adminBLController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
    }
    public function show_bl()
    {
        $allbl=blModel::join('tbl_usersell','tbl_usersell.idsell','=','tbl_binhluan.idsell')->orderby('idbinhluan','desc')->limit(10)->get();
        return View('admin.show_bl')->with('allbl',$allbl);
    }
    public function delete_bl(Request $request)
    {
        
            $idbd = $request->idbdbl1;
            $idbl = $request->idbl1;
            //dd($id);
            DB::table('tbl_binhluan')->where('idbinhluan',$idbl)->delete();
             $allbl=DB::table('tbl_binhluan')
             ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_binhluan.idbd')
             ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
             ->orderby('idbinhluan','desc')->get();
            return json_encode($allbl);
    }
    public function phantrang_bl(Request $request)
    {
       
        if($request->get('trang'))
        {
            $trang=$request->get('trang');
            $a=$trang*10-10;
            $data = blModel::join('tbl_usersell','tbl_usersell.idsell','=','tbl_binhluan.idsell')->orderby('idbinhluan','desc')->offset($a)->limit(10)->get();
            return Response()->json($data);
       }
    }
}
