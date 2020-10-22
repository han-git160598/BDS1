<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\bdModel;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\Count;

session_start(); 

class HomeController extends Controller
{
    
    public function home()
    { 
        $dataquet=bdModel::where('trangthaibd',1)->get();
        foreach($dataquet as $k=>$v)
        { 
            $hinh=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(1)->get();
            $dataquet[$k]['urlhinh']=$hinh[0]->urlhinh;
        }
        $tintuc = DB::table('tbl_tintuc')->orderby('idtintuc','desc')->get();
        $iddanhmuc = DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get();
        $hinh = DB::table('tbl_hinh')->get();
        $all_baidang= DB::table('tbl_baidang')
        ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
        ->where('tbl_baidang.trangthaibd',1)
        ->orderby('tbl_baidang.idbd','desc')->paginate(9);  
        return view('pages.home')->with('all_baidang',$all_baidang)->with('iddanhmuc',$iddanhmuc)->with('tintuc',$tintuc)->with('hinh',$hinh)->with('dataquettoado',$dataquet);
    }
    public function timkiemhome(Request $request)
        {
          
             $data=DB::table('tbl_baidang') 
             ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
             ->select('tbl_hinh.idbd',DB::raw('count(tbl_hinh.idbd) as total'))
             ->groupBy('tbl_hinh.idbd')
             ->get();
             $tam=array();
             foreach ($data as $key => $value) {
                $a = $value->idbd;
                $pt = DB::table('tbl_baidang')
                ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
                ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
                ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
                ->where('tbl_hinh.idbd',$a)
                ->where('tbl_baidang.trangthaibd',1)
                ->where('tbl_baidang.loaibd',$request->loai)//$request->loai)
                ->where('tbl_baidang.diachiall','LIKE', "%{$request->quan}%")//$request->quan)
                ->where('tbl_baidang.iddanhmuc',$request->dm)->first();//$request->dm)
                if($pt!=null)
                    { 
                    $tam[]=$pt;
                    }
              
                
                }
               // var_dump($tam);
                return json_encode($tam);
        }
        public function phan_trang_home(Request $request)
        {
            $t=$request->trang*9-9;
             $data=DB::table('tbl_baidang') 
             ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
             ->select('tbl_hinh.idbd',DB::raw('count(tbl_hinh.idbd) as total'))
             ->groupBy('tbl_hinh.idbd')
             ->offset($t)
             ->limit(9)
             ->get();
             $tam=array();
             $tam2=array();
             foreach ($data as $key => $value) {
                $a = $value->idbd;
                $pt = DB::table('tbl_baidang')
                ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
                ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
                ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
                ->where('tbl_hinh.idbd',$a)
                ->where('tbl_baidang.trangthaibd',1)
                ->first();//$request->dm)
                if($pt!=null)
                    { 
                    $tam[]=$pt;
                    }
              
                
                }
               // var_dump($tam);
                return json_encode($tam);
        }
    public function ct_bds($id)
        {
        $all_hinh=DB::table('tbl_hinh')->where('idbd',$id)->get();
        $binhluan=DB::table('tbl_binhluan')
        ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_binhluan.idbd')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_binhluan.idsell')
        ->where('tbl_baidang.idbd',$id)->orderby('idbinhluan','desc')
        ->limit(6)->get();
        $tienich= DB::table('tbl_ti_bd')->join('tbl_tienich','tbl_tienich.idtienich','=','tbl_ti_bd.idtienich')->where('idbd',$id)->get();
        $all_baidang= DB::table('tbl_baidang')
        ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
        ->where('tbl_baidang.idbd',$id)->get();  
       // dd($all_baidang);
        foreach ($all_baidang as $value) {
            $danhmuc = $value->iddanhmuc;
            $loaibd = $value->loaibd;
            $diachi =$value->diachibd;
            $gia = $value->giabd;
        }
        $gia1 = floor($gia);
        $all_hinh1=DB::table('tbl_hinh')->get();
        $bds_lienquan= DB::table('tbl_baidang')
        ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
        ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
        ->where('tbl_danhmuc.iddanhmuc',$danhmuc)
        ->where('tbl_baidang.loaibd',$loaibd)
        ->where('tbl_baidang.diachibd',$diachi)
        ->whereBetween('tbl_baidang.giabd', [$gia1-1, $gia1+1])
        ->whereNotIn('tbl_baidang.idbd',[$id])
        ->paginate(6); 
        return view('pages.chitietbds')->with('all_baidang',$all_baidang)->with('all_hinh',$all_hinh)->with('binhluan',$binhluan)->with('tienich',$tienich)->with('all_hinh1',$all_hinh1)->with('bds_lienquan', $bds_lienquan);    
        }
 
    public function locdanhmuc($id)
        {
            $tintuc = DB::table('tbl_tintuc')->orderby('idtintuc','desc')->get();
            $iddanhmuc= DB::table('tbl_danhmuc')->get();
            $danhmuc= DB::table('tbl_hinh')
            ->join('tbl_baidang','tbl_baidang.idbd','=','tbl_hinh.idbd')
            ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
            ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
            ->where('tbl_baidang.trangthaibd',0)
            ->where('tbl_baidang.iddanhmuc',$id)
            ->orderby('idhinh','desc')->paginate(9);  
           // dd($danhmuc);
            return view('pages.danh_muc')->with('danhmuc',$danhmuc)->with('iddanhmuc',$iddanhmuc)->with('tintuc',$tintuc);
  
        }
        public function luuvet(Request $request)
        {   
             $id = $request->idbdd;
            $luuvet=DB::table('tbl_baidang')->where('tbl_baidang.idbd',$id)->get();
            $hinh=DB::table('tbl_hinh')->where('tbl_hinh.idbd',$id)->first();
           $luuvet[]=$hinh->urlhinh;
          return json_encode($luuvet);
            
        }
        public function save_rating(Request $request)
        {   $id = Session::get('idsell');
            if(isset($id))
            {
            $r = $request->rated;   
            $idbd = $request->idbd2;
            $rated=DB::table('tbl_baidang')->where('idbd',$idbd)->get();
            $idsell = $rated[0]->idsell;
            $user=DB::table('tbl_usersell')->where('idsell',$idsell)->get();
            $v = $user[0]->danhgia;
            $value = ($v + $r)/2;
            $usersell = DB::table('tbl_usersell')->where('idsell',$idsell)->update(['danhgia'=>
                $value]);
            }else{
            $mes['mes']='Vui lòng đăng nhập!!';
            return json_encode($mes);
            }    
        }
        

}
 
