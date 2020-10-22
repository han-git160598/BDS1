<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class userBLController extends Controller
{
	public function save_binhluan(Request $request)
	{


		$data= array();
		$data['noidung']=$request->noidungbinhluan;
		$data['idbd']=$request->idbdbiluan;
		$data['idsell']=$request->idsellbl;
		DB::table('tbl_binhluan')->insert($data);
		//$id=DB::getPDO()->lastInsertId();
		//$binhluan=DB::table('tbl_binhluan')->where('idbinhluan',$id)->get();
		 $binhluan=DB::table('tbl_binhluan')
        ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_binhluan.idbd')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_binhluan.idsell')
        ->where('tbl_baidang.idbd',$request->idbdbiluan)->orderby('idbinhluan','desc')->get();
		return json_encode($binhluan);
	}
	public function delete_binhluan(Request $request)
	{
		
			$idbd = $request->idbdbl1;
			$idbl = $request->idbl1;
			//dd($id);
			DB::table('tbl_binhluan')->where('idbinhluan',$idbl)->delete();
			 $binhluan=DB::table('tbl_binhluan')
	        ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_binhluan.idbd')
	        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_binhluan.idsell')
	        ->where('tbl_baidang.idbd',$idbd)->orderby('idbinhluan','desc')->get();
			return json_encode($binhluan);
	}
	public function sua_binhluan(Request $request)
	{
		
			$idbd = $request->idbdbl1;
			$idbl = $request->idbl1;
			$noidung= $request->noidung1;
			//dd($id);
			DB::table('tbl_binhluan')->where('idbl',$idbl)->update(['noidung'=>$noidung]);
			 $binhluan=DB::table('tbl_binhluan')
	        ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_binhluan.idbd')
	        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_binhluan.idsell')
	        ->where('tbl_baidang.idbd',$idbd)->orderby('idbinhluan','desc')->get();
			return json_encode($binhluan);
	}
}
