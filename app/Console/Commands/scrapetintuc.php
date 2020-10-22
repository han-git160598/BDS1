<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use app\Post;
use DB;

class scrapetintuc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:tintuc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $crawler = Goutte::request('GET', 'https://blog.rever.vn');

        $tieude[] = $crawler->filter('.post-header > h2')->each(function ($node) {
            return $node->text();
        });
      //print_r($tieude);
       $slug[] = $crawler->filter('a.hs-featured-image-link')->each(function ($node) {
            return $node->attr('href');
        });
     // print_r($slug);
        $hinhanh[] = $crawler->filter('img.hs-featured-image')->each(function ($node) {
            return $node->attr('src');
           
        });
     // print_r($hinhanh);
        $mota[] = $crawler->filter('.post-body > p')->each(function ($node) {
            return $node->text();
        });
    //print_r($mota);
        $all=array();
        $a= array();
        $n=count($tieude[0]);
        for($i=0;$i<$n;$i++)
        {
            $tam=array();
            $tam[]= $tieude[0][$i];
            $tam[]= $slug[0][$i];
            $tam[]= $hinhanh[0][$i];
            $tam[]= $mota[0][$i];
            $all[]=$tam;

        }  
       // dd($all);
        $data = array();  
        $a=DB::table('tbl_tintuc')->get();
        foreach ($all as $key => $value) {  
        $data['tieude']=$value[0];
        $data['mota']=$value[3];
        $data['hinhanh']=$value[2];
        $data['slug']=$value[1];
        DB::table('tbl_tintuc')->distinct()->insert($data);
        }
        print("thanh cong"); 

         

       

   /*    
        $data = array();  
        $data['tieude']=$tieude;
        $data['mota']=$mota;
        $data['hinhanh']=$hinhanh;
        $data['slug']=$slug;
        DB::table('tbl_tintuc')->insert($data);
        print("thanh cong"); 
*/
      
       // $all = array();   
     /*  $all= $crawler->filter('.post-item')->each(
        function ($node) {

            $tieude= $node->filter('.post-header > h2')->text();

                 
            $slug[] = $node->filter('a.hs-featured-image-link')->attr('href');

            $hinhanh[] = $node->filter('img.hs-featured-image')->attr('src');
       
            $mota[] = $node->filter('.post-body > p')->text();
      
        }

    );*/
       //dd($all);
        
    }
}
