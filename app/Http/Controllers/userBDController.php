<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Session;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Redirect;
    session_start();
 
    class userBDController extends Controller
    {
       /*   
        public function ql_bds()
 		{	
 			return view('layout_ql_bd'); 
	 	}*/
	 	public function all_bds()
	 	{
            if($this->block())
            {
               DB::table('tbl_baidang')->where('quan',$quan)->get();
            }
            else{
            $id = session::get('idsell');
	 		$tienich=DB::table('tbl_tienich')->orderby('idtienich','desc')->get();
        	$idsell =DB::table('tbl_usersell')->orderby('idsell','desc')->get();
        	$iddanhmuc = DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get();
            $all_baidang= DB::table('tbl_baidang')
            ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
            ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
            ->where('tbl_baidang.idsell',$id)
            ->orderby('tbl_baidang.idbd','desc')->paginate(9); 
            $hinh = DB::table('tbl_hinh')->get();
            $dshinh=array(); 
        /*    foreach ($all_baidang as $key => $value) {
                    $hinh = DB::table('tbl_hinh')->where('tbl_hinh.idbd',$value->idbd)->first();
                  $dshinh[]=$hinh->urlhinh;
                    
                }	*/
            return view('pages.all_baidang')->with('all_baidang',$all_baidang)->with('idsell',$idsell)->with('iddanhmuc',$iddanhmuc)->with('idtienich',$tienich)->with('hinh',$hinh);	}
	 	}
	 	public function add_bds()
	 	{

            $id = session::get('idsell');   
            if(isset($id))
            {
            $user =DB::table('tbl_usersell')->where('idsell',$id)->get();
            if($user[0]->capdosell == 3)
            {
                Session::put('message','Tài khỏa đã bị khóa. Vui lòng sử dụng tài khoản khác!!');
                return view('pages.dk_usersell');
            }else{
    	 		$tienich=DB::table('tbl_tienich')->orderby('idtienich','desc')->get();
            	$idsell =DB::table('tbl_usersell')->where('idsell',$id)->get();
            	$iddanhmuc = DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get();
                return view('pages.add_baidang')->with('idsell',$idsell)
                ->with('iddanhmuc',$iddanhmuc)->with('tienich',$tienich);
                }
            }
            Session::put('message','Bạn phải đăng nhập để tiếp tục');
            return Redirect::to('/dk-usersell'); 
	 	}

	 	public function save_bds(Request $request)
	 	{
            $filehinh= $request->file('urlhinh');
            
            if (isset($filehinh))
            {  
        		$data = array();
            	$data['tenbd']=$request->tenbd;
            	$data['diachibd']=$request->diachibd;
            	$data['trangthaibd']=0;
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
             	return Redirect::to('/all-bds');
            }
            else
            {
                session::put('message','chưa thêm file hình');
                return Redirect::to('/add-bds');
            }
        	
       		 		
	 	}
        public function edit_bds($id)
        {
             $this->block();
            $idsell=Session::get('idsell');
            $tienich=DB::table('tbl_tienich')->orderby('idtienich','desc')->get();
            $iddanhmuc = DB::table('tbl_danhmuc')->orderby('iddanhmuc','desc')->get(); 
            $idsell = DB::table('tbl_usersell')->where('idsell',$idsell)->get();  
           // $edit_baidang = DB::table('tbl_baidang')->where('idbd',$id)->get();
            //$idhinh = DB::table('tbl_hinh')->where('idbd',$id)->get();
            $manager= DB::table('tbl_baidang')  
            ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
            ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
            ->where('tbl_baidang.idbd',$id)->get();
            //dd($manager);
            return view('pages.edit_baidang')->with('manager',$manager)->with('iddanhmuc',$iddanhmuc)->with('tienich',$tienich)->with('idsell',$idsell); 
        }
        public function update_bds(Request $request,$id)
        {
           
                $filehinh= $request->file('urlhinh');
                
                if (isset($filehinh))
                {  
                    $data = array();
                    $data['tenbd']=$request->tenbd;
                    $data['diachibd']=$request->diachibd;
                    $data['trangthaibd']=0;
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
                    $data['diachiall']=$request->diachiall;
                    $data['sdtbd']=$request->sdtbd;
                    $data['idsell']=$request->idsell;
                   
                    
                    DB::table('tbl_baidang')->where('idbd',$id)->update($data);
                    $idbd = DB::table('tbl_baidang')->where('idbd',$id)->get();
                    //dd($id);
                    DB::table('tbl_hinh')->where('idbd',$id)->delete();
                    $arrayhinh =array();
                    foreach($filehinh as $k=>$v)
                    {
                    $tenhinh=$v->getClientOriginalName();
                     $name_image=current(explode('.', $tenhinh));
                     $new_image=$name_image.rand(0,99).'.'.$v->getClientOriginalExtension();
                     $v->move('aaa/uploads',$new_image);
                     $arrayhinh['urlhinh']=$new_image;
                     $arrayhinh['idbd']=$id;
                     // dd($arrayhinh);
                     DB::table('tbl_hinh')->insert($arrayhinh); 
                    }
                 
                    
                    DB::table('tbl_ti_bd')->where('idbd',$id)->delete();
                    $arraytienich=isset($request->tienich)?$request->tienich:array();
                    $datatienich=array();
                    $x=count($arraytienich);
                    if($x==0)
                    {

                    }else{
                    foreach($arraytienich as  $k => $v)
                    {   
                        $datatienich['idtienich']=$v;
                        $datatienich['idbd']=$id;
                        DB::table('tbl_ti_bd')->insert($datatienich);
                    }
                    }

                    session::put('message','update sucssec');
                    return Redirect::to('/all-bds');
                }
                else
                {
                    session::put('message','chưa thêm file hình');
                    return Redirect::to('/edit-bds/'.$id);
                }      
            
        }
      



        public function delete_bds($id)
        {
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
            if(isset($b)){
                DB::table('tbl_lichhen')->where('idbd',$id)->delete();          
            }
            if(isset($e))
            {
                DB::table('tbl_ti_bd')->where('idbd',$id)->delete(); 
            }
            DB::table('tbl_baidang')->where('idbd',$id)->delete();
            session::put('message','Xóa thành công !');
            return Redirect::to('/all-bds/');
        }
       
         public function tim(Request $request)
        {
            $query = $request->tim;
            $idsell = session::get('idsell');
            if($query=='')
            {
                $data=DB::table('tbl_baidang') 
                 ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
                 ->select('tbl_hinh.idbd',DB::raw('count(tbl_hinh.idbd) as total'))
                 ->groupBy('tbl_hinh.idbd')
                 ->get();
                $tam=array();
                foreach ($data as $key => $value) {
                $id = $value->idbd;
                $dt= DB::table('tbl_baidang')
                ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
                ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
                ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
                ->where('tbl_usersell.idsell',$idsell)
                ->where('tbl_hinh.idbd',$id)->first();
                if($dt!=null)
                    { 
                    $tam[]=$dt;
                    }
                }
                return json_encode($tam);
            }
            else
            {
                $data=DB::table('tbl_baidang') 
                 ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
                 ->select('tbl_hinh.idbd',DB::raw('count(tbl_hinh.idbd) as total'))
                 ->groupBy('tbl_hinh.idbd')
                 ->get();
                $tam=array();
                foreach ($data as $key => $value) {
                $id = $value->idbd; 
                $dt= DB::table('tbl_baidang')
                ->join('tbl_hinh','tbl_hinh.idbd','=','tbl_baidang.idbd')
                ->join('tbl_danhmuc','tbl_danhmuc.iddanhmuc','=','tbl_baidang.iddanhmuc')
                ->join('tbl_usersell','tbl_usersell.idsell','=','tbl_baidang.idsell')
                ->where('tbl_usersell.idsell',$idsell)
                ->where('tbl_hinh.idbd',$id)
                ->where('tbl_baidang.tenbd', 'LIKE', "%{$query}%")->first();

                if($dt!=null)
                    { 
                    $tam[]=$dt;
                    }
                }
                return json_encode($tam);
            }      
        }
        public function quan_api()
        {
            $url="https://thongtindoanhnghiep.co/api/city/4/district";
            echo @file_get_contents($url); 
        }
        

        public function phuong_api(Request $request)
        {
            $id=$request->id;
            $url="https://thongtindoanhnghiep.co/api/district/".$id."/ward";
            echo @file_get_contents($url); 
        }
        public function block()
        {

            $id = session::get('idsell');   
            $user =DB::table('tbl_usersell')->where('idsell',$id)->get();
            if($user[0]->capdosell == 3)
            {
                Session::put('message','Tài khỏa đã bị khóa. Vui lòng sử dụng tài khoản khác!!');
                return view('pages.dk_usersell');
            }
           
        }
}