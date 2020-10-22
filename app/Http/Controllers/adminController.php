<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
class adminController extends Controller
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
    public function AuthLogin()
    {
        $admin_id=Session::get('idadmin');
        $idsell = Session::get('idsell');
        $id_sell=DB::table('tbl_usersell')->where('idsell',$idsell)->where('capdosell',1)->first();
        if($admin_id || $id_sell)
        {
            return Redirect::to('/ql-admin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function admin_login(Request $request)
    {
        $this->AuthLogin();
        return view('admin_layout');
    }
    public function login_admin(Request $request)
    {
        
        $emailadmin = $request->username;
        $passwordadmin=$request->password;

        $result = DB::table('tbl_admin')->where('emailadmin',$emailadmin)->where('passwordadmin',$passwordadmin)->first();
         $result1 = DB::table('tbl_usersell')->where('emailsell',$emailadmin)->where('passwordsell',$passwordadmin)->where('capdosell',1)->first();
       // dd($result);
        if($result)
        {
            Session::put('tenadmin',$result->tenadmin);
            Session::put('idadmin',$result->idadmin);
            return Redirect::to('/ql-admin');
           //return Redirect()->back();
        }else if($result1)
        {
             Session::put('idsell',$result1->idsell);
            Session::put('tensell',$result1->tensell);
            return Redirect::to('/ql-admin');
        }
        else
        {
            Session::put('message','Mật Khẩu Hoặc Tài Khoản Không Đúng !');
            return Redirect::to('/admin');
        }
    }
    public function logout_admin()
    {
        $this->AuthLogin();
       $idadmin = Session::get('idadmin');
        if(isset($idadmin)){
        Session::put('tenadmin',null);
        Session::put('idadmin',null);
        return view('admin_login');
        }else{
        Session::put('tensell',null);
        Session::put('idsell',null);
        return view('admin_login');
        }
    }
    
}
