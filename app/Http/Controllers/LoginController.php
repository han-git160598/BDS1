<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\UsersellModel;
use Laravel\Socialite\Facades\Socialite;

session_start();

class LoginController extends Controller
{
	
    public function save_usersell(Request $request)
    {   $mes=array('mes'=>'kh');
        $a=DB::table('tbl_usersell')->where('emailsell',$request->email)->get();
    	if(count($a)>0)
        {
            $mes['mes']='Tài khoản đã tồn tại !!';
            return json_encode($mes);
            /*session::put('message','Tài khoản đã tồn tại !!');                
             return Redirect::to('/dk-usersell');*/
        }
        else
        {
            $data= array();
            $data['tensell']=$request->tenkh;   
            $data['emailsell']=$request->email;
            $data['passwordsell']=$request->pass;
            $data['sdtsell']=$request->sdt;
            $data['ngaysinhsell']=$request->ngaysinh;
            $data['capdosell']=0;
            $data['danhgia']=0;
            $data['ngaytao']=(new \DateTime())->format('Y-m-d H:i:s');
            DB::table('tbl_usersell')->insert($data);
            $a = DB::table('tbl_usersell')->orderby('idsell','desc')->limit(1)->get();
            Session::put('tensell',$a[0]->tensell);
            Session::put('idsell',$a[0]->idsell);
            $mes['mes']='Đăng ký thành công';
            return json_encode($mes); 
        }
    }
    public function login_sell(Request $request)
    {
    	$emailsell = $request->emailsell;
    	$passwordsell=$request->passwordsell;

    	$result = DB::table('tbl_usersell')->where('emailsell',$emailsell)->where('passwordsell',$passwordsell)->first();
       // dd($result);
    	if($result)
    	{
    		Session::put('tensell',$result->tensell);
    		Session::put('idsell',$result->idsell);
    		return Redirect::to('/home');
           //return Redirect()->back();
    	}else
    	{
    		Session::put('message','Mật Khẩu Hoặc Tài Khoản Không Chính Xác!!! Vui long Nhập Lại ');
    		return Redirect::to('/dk-usersell');
    	}
       

    }
    public function dk_usersell()
    {
        $a = Session::get('idsell');
        if($a)
        {
            return Redirect::to('/all-bds');
        }

         return view('pages.dk_usersell');
    }
    public function logout_usersell()
    {
    	Session::put('tensell',null);
    	Session::put('idsell',null);
    	return view('pages.dk_usersell');
    }
    public function edit_usersell()
    {
        $id = Session::get('idsell');
        if($id)
        {
           $user = DB::table('tbl_usersell')->where('idsell',$id)->get();
            return view('pages.edit_user')->with('user',$user); 
        }
        
        Session::put('message','Bạn chưa đăng nhập');
        return view('pages.dk_usersell');
    }
    public function update_usersell(Request $request,$id)
    {
        $data= array();
        $data['tensell']=$request->tenkh;
        $data['passwordsell']=$request->passwordkh;
        $data['sdtsell']=$request->sdtkh;
        $data['ngaysinhsell']=$request->ngaysinhkh;
        DB::table('tbl_usersell')->where('idsell',$id)->update($data);
        session::put('message','Cập nhật thành công !');
        return Redirect::to('/edit-usersell/');
    } 
    public function redirect()//login facebook
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $userf = Socialite::driver('facebook')->user();

        $a=DB::table('tbl_usersell')->where('emailsell',$userf->email)->get();
        if(count($a)>0)
        {
             Session::put('tensell',$a[0]->tensell);
    		Session::put('idsell',$a[0]->idsell);
            return Redirect::to('/home');
           
            
        }
        $data= array();
        $data['tensell']=$userf->name;
        $data['emailsell']=$userf->email;
        $data['passwordsell']='';
        $data['sdtsell']=0;
        $data['ngaysinhsell']='2020-06-27';
        $data['capdosell']=0;
        DB::table('tbl_usersell')->insert($data);
        $id = DB::table('tbl_usersell')->orderby('idsell', 'desc')->first();
        Session::put('tensell',$id[0]->tensell);
    	Session::put('idsell',$id[0]->idsell);
        return Redirect::to('/home');
    }
    public function redirect2()//login google
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback2()
    {
        $userf = Socialite::driver('google')->user();
        $a=DB::table('tbl_usersell')->where('emailsell',$userf->email)->get();
        if(count($a)>0)
        {
            Session::put('tensell',$userf->name);
            Session::put('idsell',$a->idsell);
            return Redirect::to('/home');
        }
        $data= array();
        $data['tensell']=$userf->name;
        $data['emailsell']=$userf->email;
        $data['passwordsell']='';
        $data['sdtsell']=0;
        $data['ngaysinhsell']='2020-06-27';
        $data['capdosell']=0;
        DB::table('tbl_usersell')->insert($data);
        $id = DB::table('tbl_usersell')->orderby('idsell', 'desc')->first();
        Session::put('tensell',$userf->name);
       Session::put('idsell',$id->idsell);
         return Redirect::to('/home');

    }

}