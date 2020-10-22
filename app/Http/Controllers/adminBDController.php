<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\bdModel;
 use Illuminate\Support\Facades\Session;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Redirect;

class adminBDController extends Controller
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
    public function show_bd()
    {   
       // $allbd=bdModel::limit(2)->get();
        $allbd=bdModel::limit(5)->orderby('idbd','desc')->get();
        foreach($allbd as $k=>$v)
        { 
            $allbd[$k]['hinh']=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(10)->get();
        }
        return View('admin.show_bd')->with('allbd',$allbd);
    }
     public function admin_form_add_bd()
    {    $id = session::get('idsell');   
       $tienich=DB::table('tbl_tienich')->orderby('idtienich','desc')->get();
       $idsell =DB::table('tbl_usersell')->where('idsell',$id)->get();
        $iddanhmuc = DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get();
        return view('admin.add_bd')->with('iddanhmuc',$iddanhmuc)->with('tienich',$tienich)->with('idsell',$idsell);
        
    }
    public function admin_save_bd(Request $request)
    {
        $filehinh= $request->file('urlhinh');
            
        
        $data = array();
        $data['tenbd']=$request->tenbd;
        $data['diachibd']=$request->diachibd;
        $data['trangthaibd']=1;
        $data['giabd']=$request->giabd;
        $data['motabd']=$request->motabd;
        $data['loaibd']=$request->loaibd;
        $data['iddanhmuc']=$request->danhmucbd;
        if($request->danhmucbd==3)
        {
            $data['sotang']=$request->sotang;
            $data['chieungang']=$request->chieungang;
            $data['mattien']=$request->mattien;
            if($request->mattien==0)
            {
                $data['oto']=$request->oto;
            }
            else
            {
                $data['oto']=1;
            }
        }
        else
        {
            $data['sotang']=0;
            $data['chieungang']=0;
            $data['mattien']=1;
            $data['oto']=1;
        }
        $data['phongngu']=$request->phongngu;
        $data['nhatam']=$request->phongtam;
        $data['thoigian']=(new \DateTime())->format('Y-m-d H:i:s');
        $data['dientich']=$request->dientichbd;
        $data['lat']=$request->latbd;
        $data['lng']=$request->lngbd;
        $data['toado']=$request->toado;
        $data['sdtbd']=$request->sdtbd;
        $data['diachiall']=$request->diachiall;
        $data['idsell']=$request->idsell;
       
        
        DB::table('tbl_baidang')->insert($data);
        $id = DB::table('tbl_baidang')->orderby('idbd', 'desc')->first();
        //dd($id);
        $arrayhinh =array();
        foreach($filehinh as $k=>$v)
        {
        $tenhinh=$v->getClientOriginalName();
         $name_image=current(explode('.', $tenhinh));
         $new_image=$name_image.rand(0,99).'.'.$v->getClientOriginalExtension();
         $v->move('aaa/uploads',$new_image);
         $arrayhinh['urlhinh']=$new_image;
         $arrayhinh['idbd']=$id->idbd;
         // dd($arrayhinh);
         DB::table('tbl_hinh')->insert($arrayhinh); 
        }
       
        
        
        $arraytienich=isset($request->tienich)?$request->tienich:array();
        $datatienich=array();
        $x=count($arraytienich);
        if($x==0)
        {

        }else{
        foreach($arraytienich as  $k => $v)
        {       
            $datatienich['idtienich']=$v;
            $datatienich['idbd']=$id->idbd;
            DB::table('tbl_ti_bd')->insert($datatienich); 
        }
        }

         session::put('message','Add sucssec');
         return Redirect::to('/show-bd');
            
    }

    public function status_1_bd($idbd)
    {
       bdModel::where('idbd',$idbd)->update(['trangthaibd'=>0]);
        return Redirect::to('show-bd');
    }
    public function stutus_0_bd($idbd)
    {
       bdModel::where('idbd',$idbd)->update(['trangthaibd'=>1]);
        return Redirect::to('show-bd');
    }
    public function seach_bd(Request $request)
    {
        if($request->get('key')=='')
        {
            $data = bdModel::orderby('tbl_baidang.idbd','asc')->get();
            foreach($data as $k=>$v)
            { 
                $hinh=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(1)->get();
                $data[$k]['hinh']=$hinh[0]->urlhinh;
            }
            return Response()->json($data);
       }else{

            $keywork = $request->get('key');
            $data = bdModel::where('tenbd', 'LIKE', "%{$keywork}%")->get();
            foreach($data as $k=>$v)
            { 
                $hinh=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(1)->get();
                $data[$k]['hinh']=$hinh[0]->urlhinh;
            }
            return Response()->json($data);
       }
    }
    public function phantrang_bd(Request $request)
    {

        if($request->get('trang'))
        {
            $trang=$request->get('trang');
            $a=$trang*5-5;
            $data = bdModel::offset($a)->limit(5)->get();
            foreach($data as $k=>$v)
            { 
                $hinh=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(1)->get();
                $data[$k]['hinh']=$hinh[0]->urlhinh;
            }
            return Response()->json($data);
        }
    }
    public function admin_loc_tinhtrang(Request $request)
    {
        $tinhtrang=$request->get('tinhtrang');
        if($tinhtrang==2)
        {
             $allbd=bdModel::limit(5)->orderby('idbd','desc')->get();
        }
        else
        {
            $allbd=bdModel::limit(5)->where('trangthaibd',$tinhtrang)->orderby('idbd','desc')->get();
        }
        
        foreach($allbd as $k=>$v)
        { 
             $hinh=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(1)->get();
                $allbd[$k]['hinh']=$hinh[0]->urlhinh;
        }
        return Response()->json($allbd);
    }
    public function sapxep_bds()
    {
        $allbd=bdModel::limit(5)->where('trangthaibd',0)->orderby('idbd','desc')->get();
        foreach($allbd as $k=>$v)
        { 
            $allbd[$k]['hinh']=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(1)->get();
        }
        return view('admin.show_trangthai')->with('allbd',$allbd);
    }
    public function admin_xoa_bd(Request $request)
        {
            $id=$request->get('idbdd');
            $a = DB::table('tbl_hinh')->where('idbd',$id)->get();
            $b = DB::table('tbl_lichhen')->where('idbd',$id)->get();
            $c = DB::table('tbl_luutin')->where('idbd',$id)->get();
            $d = DB::table('tbl_binhluan')->where('idbd',$id)->get();
            $e = DB::table('tbl_ti_bd')->where('idbd',$id)->get();
            if( isset($a))
            {
                DB::table('tbl_hinh')->where('idbd',$id)->delete();
            }if(isset($c))
            {
                DB::table('tbl_luutin')->where('idbd',$id)->delete();   
            }
            if(isset($d))
            {
                DB::table('tbl_binhluan')->where('idbd',$id)->delete(); 
            }
            if(isset($e))
            {
                DB::table('tbl_ti_bd')->where('idbd',$id)->delete();
            }
            if(isset($b)){
                DB::table('tbl_lichhen')->where('idbd',$id)->delete();          
            }
            DB::table('tbl_baidang')->where('idbd',$id)->delete();
           $data = bdModel::limit(5)->get();
            foreach($data as $k=>$v)
            { 
                $hinh=DB::table('tbl_hinh')->where('idbd',$v->idbd)->limit(1)->get();
                $data[$k]['hinh']=$hinh[0]->urlhinh;
            }
            return Response()->json($data);

        }

}
