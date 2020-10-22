<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use DB;
    use Session;
    use App\Http\Requests;
    use Illuminate\Support\Facades\Redirect;
    session_start();

    class TinTucController extends Controller
    {
    	public function all_tintuc()
    	{
    	
    	$tintuc = DB::table('tbl_tintuc')->orderby('idtintuc','desc')->paginate(9);
    	return view('pages.tintuc')->with('tintuc',$tintuc);
    	}
    }