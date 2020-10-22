<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\usersellModel;
use App\blModel;
use App\bdModel; 
use Facade\FlareClient\View;

class adminusersellController extends Controller
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
    public function show_usersell()
    {
       
        $allusersell=usersellModel::limit(10)->get();
        return View('admin.show_usersell')->with('allusersell',$allusersell);
    }
    public function seach_usersell(Request $request)
    {
       
        if($request->get('key')=='')
        {
            $data = usersellModel::get();
            return Response()->json($data);
        }else{ 
            $keywork = $request->get('key');
            $data = usersellModel::where('emailsell', 'LIKE', "%{$keywork}%")->get();
            return Response()->json($data);
        }
    }
    public function phantrang_usersell(Request $request)
    {
       
        if($request->get('trang'))
        {
            $trang=$request->get('trang');
            $a=$trang*10-10;
            $data = usersellModel::offset($a)->limit(10)->get();
            return Response()->json($data);
       }
    }
    public function quyen_usersell(Request $request)
        {
            $idadmin = Session::get('idadmin');

            if($idadmin=='')
            {   
                $mes=array('mes'=>'Chỉ admin mới có quyền thay đổi');
                return json_encode($mes);   
            }else{

                $id=$request->get('idsell');
                $capdo=$request->get('capdo1');
                DB::table('tbl_usersell')->where('idsell',$id)->update(['capdosell'=>$capdo]);
                $mes=array('mes'=>'Cập nhật quyền thành công');
                return json_encode($mes);
            }
        }
    public function chi_tiet_usersell($idsell)
    {
        $baidang=bdModel::where('idsell',$idsell)->get();
        foreach($baidang as $k=>$v)
        { 
            $baidang[$k]['hinh']=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(10)->get();
        }
        $binhluan=blModel::where('idsell',$idsell)->get();
        $usersell=usersellModel::where('idsell',$idsell)->get();
        return view('admin.chi_tiet_usersell')->with('baidang',$baidang)->with('binhluan',$binhluan)->with('usersell',$usersell);
    }
}
