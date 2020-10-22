<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class userLTController extends Controller
{
	
	public function luutin(Request $request)
	{
		$idsell = Session::get('idsell');
		$mes=array('mes'=>'kh');
		$a= DB::table('tbl_luutin')->where('idsell',$idsell)->where('tbl_luutin.idbd',$request->idbdd)->get();
		$x=Count($a);
		if(Session::get('idsell')=='')
		{
			$mes['mes']='Bạn chưa đăng nhập';
			 return json_encode($mes);
		}
		elseif($x>0)
		{
			$mes['mes']='Tin đã được lưu trước đó';
			 return json_encode($mes);
		}
		else
		{  
		$mes['mes']='Lưu thành công';
		//$mes['mes']=$request->idselll;
		$data=array();
		$data['idbd']=$request->idbdd;
		$data['idsell']=$request->idselll;
		DB::table('tbl_luutin')->insert($data);
		return json_encode($mes);
		}
		
	}
	public function all_luutin()
	{
		$id = Session::get('idsell');
		if(Session::get('idsell')=='')
		{
			Session::put('message','Đăng nhập để xem danh sách yêu thích của bạn');
			return Redirect::to('dk-usersell');
		}else{
        $hinh = DB::table('tbl_hinh')->get();
        $luutin= DB::table('tbl_baidang')
        ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
        ->join('tbl_luutin','tbl_luutin.idbd','=','tbl_baidang.idbd')
        ->where('tbl_luutin.idsell',$id)
        ->orderby('tbl_luutin.idluutin','desc')->get();   
		return view('pages.luu_tin')->with('luutin',$luutin)->with('hinh',$hinh);
		}
	}
	public function delete_luutin($id)
	{
		DB::table('tbl_luutin')->where('idluutin',$id)->delete();
		Session::put('message','Xóa thanh cong');
		return Redirect::to('/all-luutin');
	}
}