<?php
 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\DomCrawler\Form;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 


Route::get('/', function () {
	$iddanhmuc = DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get();
    $tintuc = DB::table('tbl_tintuc')->orderby('idtintuc','desc')->get();
    return view('layout_FE')->with('tintuc',$tintuc)->with('iddanhmuc',$iddanhmuc);
});
/*Route::get('/test',function(){
	$iddanhmuc = DB::table('tbl_danhmuc')->get();
    return view('pages.test')->with('iddanhmuc',$iddanhmuc); 
});*/

// home ==============================================
Route::get('/','HomeController@home'); 
Route::get('/home','HomeController@home');
Route::get('/chi-tiet-bds/{idbd}','HomeController@ct_bds');
Route::get('/save-rating','HomeController@save_rating');
Route::get('timkiemhome','HomeController@timkiemhome');
Route::get('groupby-duong','HomeController@groupby_duong');
Route::get('/phan-trang-home','HomeController@phan_trang_home');

//luu vet========================================
Route::get('/luu-vet','HomeController@luuvet');
//loginsell================================================
/*Route::get('/dk-usersell',function(){

	return view('pages.dk_usersell');
});*/
Route::get('/dk-usersell','LoginController@dk_usersell');
Route::get('/login-usersell','LoginController@login_sell');
Route::get('/logout-usersell','LoginController@logout_usersell');
Route::get('/save-usersell','LoginController@save_usersell');
Route::post('/update-usersell/{idsell}','LoginController@update_usersell');
Route::get('/edit-usersell','LoginController@edit_usersell');

Route::get('/login/facebook', 'LoginController@redirect');
Route::get('/login/facebook/callback', 'LoginController@callback');

Route::get('/login/google', 'LoginController@redirect2');
Route::get('/login/google/callback', 'LoginController@callback2');
 


//ql bài đăng====================================
Route::get('/ql-baidang',function(){
	return view('layout_ql_bd'); 
}); 
Route::get('/add-bds','userBDController@add_bds'); 
Route::post('/save-bds','userBDController@save_bds');

Route::get('/all-bds','userBDController@all_bds'); 
Route::get('/delete-bds/{idbd}','userBDController@delete_bds');

Route::get('/edit-bds/{idbd}','userBDController@edit_bds');
Route::post('/update-bds/{idbd}','userBDController@update_bds');

Route::get('/tim','userBDController@tim');


//quan huyen=======================================
Route::get('/quan','userBDController@quan_api');
Route::get('/phuong','userBDController@phuong_api'); 



//lich chen===============================================
Route::get('/save-lichhen','userLHController@add_lichhen');
Route::get('/all-lichhen','userLHController@all_lichhen');
Route::get('/delete-lichhen/{idlichhen}','userLHController@delete_lichhen');
Route::get('/tt-lichhen','userLHController@tt_lichhen');
//binh luan========================================================
Route::get('/save-binhluan','userBLController@save_binhluan');
Route::get('/delete-binhluan','userBLController@delete_binhluan');
Route::get('/sua-binhluan','userBLController@sua_binhluan');

// loc danh muc
Route::get('/danh-muc/{iddanhmuc}','HomeController@locdanhmuc');
Auth::routes();
//luu tin
Route::get('/luu-tin',function(){
		$iddanhmuc = DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get();
        $luutin= DB::table('tbl_hinh')
        ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_hinh.idbd')
        ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
        ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_hinh.idbd')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
        ->where('tbl_baidang.trangthaibd',0)
        ->orderby('idhinh','desc')->paginate(9);  
        return view('pages.luu_tin')->with('luutin',$luutin)->with('iddanhmuc',$iddanhmuc);
	
});
Route::get('/save-luutin','userLTController@luutin');
Route::get('/all-luutin','userLTController@all_luutin');
Route::get('/delete-luutin/{idluutin}','userLTController@delete_luutin');

//tin tuc ========================================================
Route::get('/tintuc','TinTucController@all_tintuc');

/// admin---------------------admin---------------------admin---------------------admin---------------------
//------------ADMIN-------------------ADMIN------------------------------ADMIN-----------------------------
Route::get('/admin', function () {
        $id = Session::get('idsell');
        if($id=='')
        {
             return view('admin_login');
         }else{
        $result = DB::table('tbl_usersell')->where('idsell',$id)->where('capdosell',1)->first();
        if($result)
        {
            Session::put('tensell',$result->tensell);
            Session::put('idsell',$result->idsell);
            return Redirect::to('/ql-admin');
        }
        else
        {
            Session::put('message','tài khoản không được phép hoặc sai thông tin !');
            return Redirect::to('/home');
        }
    }
});
/*Route::get('/ql-admin', function () {
    return view('admin_layout');
});admin-login*/
Route::get('/ql-admin','adminController@admin_login');


Route::get('/login-admin','adminController@login_admin');
Route::get('/logout-admin','adminController@logout_admin');

// usersell
Route::get('/show-usersell','adminusersellController@show_usersell');
Route::get('/seach-usersell','adminusersellController@seach_usersell');
Route::get('/phantrang-usersell','adminusersellController@phantrang_usersell');
Route::get('/quyen-usersell','adminusersellController@quyen_usersell');
Route::get('/chi-tiet-usersell/{idsell}','adminusersellController@chi_tiet_usersell');
// bai dang
Route::get('/show-bd','adminBDController@show_bd');
Route::get('/status-1-bd/{idbd}','adminBDController@status_1_bd');
Route::get('/status-0-bd/{idbd}','adminBDController@stutus_0_bd');
Route::get('/seach-bd','adminBDController@seach_bd');
Route::get('/phantrang-bd','adminBDController@phantrang_bd');//moi trang muốn show bao nhiêu bai đăng
Route::get('/sapxep-bds','adminBDController@sapxep_bds');
Route::get('/admin-loc-tinhtrang','adminBDController@admin_loc_tinhtrang');
Route::get('/admin-form-add-bd','adminBDController@admin_form_add_bd');
Route::post('/admin-save-bd','adminBDController@admin_save_bd');
Route::get('/admin-xoa-bd','adminBDController@admin_xoa_bd');

// binh luan
Route::get('/show-bl','adminBLController@show_bl');
Route::get('/delete-bl','adminBLController@delete_bl');
Route::get('/phantrang-bl','adminBLController@phantrang_bl');
// danh muc 
Route::get('/show-dm','adminDMController@show_dm');
Route::get('/form-add-dm','adminDMController@form_add_dm');
Route::post('/save-dm','adminDMController@save_dm');
Route::get('/edit-dm','adminDMController@edit_dm');//tra ve json, ajax
Route::get('/delete-dm','adminDMController@delete_dm');
Route::get('/kt-dm','adminDMController@kt_dm');
// tiện ich
Route::get('/show-ti','adminTIController@show_ti');
Route::get('/form-add-ti','adminTIController@form_add_ti');
Route::post('/save-ti','adminTIController@save_ti');
Route::get('/edit-ti','adminTIController@edit_ti');//tra ve json, ajax
Route::get('/delete-ti','adminTIController@delete_ti');
Route::get('/kt-ti','adminTIController@kt_ti');


Route::get('/mail', function () {
    return view('pages.form');
});
Route::post('/otp-mail','GmailController@gui_otp');
//ql bài đăng====================================
Route::get('/lien-he',function(){
    return view('pages.lien_he'); });
Route::get('/gui-vande','GmailController@gui_vande');
    