<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB,Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class userLHController extends Controller
{
	public function add_lichhen(Request $request)
    {
        $id= $request->idbd;
        $mes=array('mes'=>'kh');
        $a= DB::table('tbl_lichhen')->where('idbd',$id)->where('tbl_lichhen.emailkh',$request->emailkh)->get();
        $x=Count($a);
        if($x>0)
        {
            $mes['mes']='Tin đã được lưu trước đó';
             return json_encode($mes);
        }
        else
        {  
        $idbd = $request->idbd;
        //$mes['mes']=$request->idselll;
        $data= array();
        $data['tenkh'] = $request->tenkh;
        $data['emailkh']= $request->emailkh;
        $data['phone']= $request->sdtkh;
        $data['thoigian']=$request->thoigianhen;
        $data['trangthai']=$request->trangthai_lh;
        $data['idbd'] = $request->idbd;
        DB::table('tbl_lichhen')->insert($data);
        $emailsell = DB::table('tbl_usersell')
        ->join('tbl_baidang','tbl_baidang.idsell','=','tbl_usersell.idsell')
        ->where('idbd',$idbd)->get();
        $mes['mes']='Đặt lịch thành công';
        $arrEmail = [$request->emailkh];
        $arrEmaildt = [$emailsell[0]->emailsell];
        $data1 = ['mail'=>$request->emailkh,
             'tenkh' => $request->tenkh,  
             'sdtkh' => $request->sdtkh, 
             'thoigianhen' => $request->thoigianhen,
             'idbd' => $request->idbd];
        Mail::send('pages.gmail_thongbao',$data1,function($message) use ($arrEmail,$arrEmaildt){
        $message->from('hanhan160598@gmail.com', 'BDS SaiGonHome');
        $message->to($arrEmail[0])->subject('THÔNG TIN ĐẶT LỊCH HẸN CỦA BẠN');
        $message->to($arrEmaildt[0])->subject('BẠN CÓ CUỘC HẸN');
        });
        return json_encode($mes);
        }

    } 
    public function all_lichhen()
    {
        $id = session::get('idsell');
        $hinh = DB::table('tbl_hinh')->get();
        $all_lichhen =DB::table('tbl_baidang')
        ->join('tbl_lichhen','tbl_lichhen.idbd','=','tbl_baidang.idbd')
        ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
        ->where('tbl_baidang.idsell',$id)->orderby('tbl_lichhen.idlichhen','desc')
        ->paginate(6);
        return view('pages.all_lichhen')->with('all_lichhen',$all_lichhen)->with('hinh',$hinh);
    }
    public function delete_lichhen($id)
    {	
        DB::table('tbl_lichhen')->where('idlichhen',$id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-lichhen');
    }
    public function tt_lichhen(Request $request)
    {
        $id=$request->get('idlh');
        $data= DB::table('tbl_lichhen')->where('idlichhen',$id)->get();
        if($data[0]->trangthai==0)
        {
        DB::table('tbl_lichhen')->where('idlichhen',$id)->update(['trangthai'=>1]);
        $mes=array('mes'=>'Cập nhật trạng thái thành công');
        return json_encode($mes);
        }else{
        DB::table('tbl_lichhen')->where('idlichhen',$id)->update(['trangthai'=>0]);
        $mes=array('mes'=>'Cập nhật trạng thái thành công');
        return json_encode($mes);   
        }
    }
}