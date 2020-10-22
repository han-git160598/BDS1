<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
use Symfony\Component\DomCrawler\Form;
class GmailController extends Controller
{
    public function gui_otp(Request $request)
    {

        $arrEmail = [$request->emailkh];
        $data = ['mail'=>$request->emailkh,'otp' => $request->maotp];
 		Mail::send('pages.gmail_otp',$data,function($message) use ($arrEmail){
 			 $message->from('hanhan160598@gmail.com', 'BDS SaiGonHome')->subject('Visitor Feedback!');
 			 $message->to($arrEmail[0])->subject('MÃ XÁC NHẬN OTP');
	    });
        Session::flash('flash_message', 'Send message successfully!');
    
	
    }
     public function gui_vande(Request $request) 
    {
        $mes=array('mes'=>'kh');
        $arrEmail = [$request->emailkh];
        $data = ['mail'=>$request->emailkh,
                'tenkh' => $request->ten,
                'vd' => $request->vd,
                'nd' => $request->nd,]; 
        Mail::send('pages.mail_phanhoi',$data,function($message) use ($arrEmail){
             $message->from($arrEmail[0], 'khách hàng')->subject('Phản hồi');
             $message->to('han.dh51602185@gmail.com');
        });
        Session::flash('flash_message', 'Send message successfully!');
        $mes['mes']='Gửi thành công';
        return json_encode($mes);
    }

  
} 