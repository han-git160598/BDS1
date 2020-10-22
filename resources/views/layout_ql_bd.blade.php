<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SaiGonHome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.min.js"> 
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="{{asset('frontend/fonts/icomoon/style.css')}}">
  
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/mediaelementplayer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/fl-bigmug-line.css')}}">
    
  
    <link rel="stylesheet" href="{{asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    <!--------------------------------------------------------------------------> 
              <!-- floder fe_usersell -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" /> -->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" href="{{asset('fe_usersell/css/bootstrap.min.css')}}" >
    <link href="{{asset('fe_usersell/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('fe_usersell/css/style-responsive.css')}}" rel="stylesheet"/>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('fe_usersell/css/font.css" type="text/css')}}"/>
    <link href="{{asset('fe_usersell/css/font-awesome.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('fe_usersell/css/morris.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('fe_usersell/css/monthly.css')}}">
    <script src="{{asset('fe_usersell/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('fe_usersell/js/raphael-min.js')}}"></script>
    <script src="{{asset('fe_usersell/js/morris.js')}}"></script>
<!--------------------------------------------------------------------------> 
               <!-- floder fe_support -->
    <link href="{{asset('fe_support/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fe_support/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('fe_support/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('fe_support/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('fe_support/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('fe_support/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('fe_support/css/responsive.css')}}" rel="stylesheet">  
    <link rel="shortcut icon" href="{{('fe_support/img/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{('fe_support/img/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{('fe_support/img/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{('fe_support/img/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('fe_support/img/apple-touch-icon-57-precomposed.png')}}">
<!--------------------------------------------------------------------------> 
    <script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
  </head>
  <body>
  
  <div class="site-loader"></div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <div class="border-bottom bg-white top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6">
            <p class="mb-0">
              <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">099999999</span></a>
              <a href="#"><span class="text-black fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">bds.saigonhome@gmail.com</span></a>
            </p>  
          </div>
          <div class="col-6 col-md-6 text-right">
            <a href="{{ URL::to('/admin') }}" class="mr-3"> <span class="text-black"> Admin</span></a>
            <a href="#" class="mr-3"><span class="text-black icon-facebook"></span></a>
            <a href="#" class="mr-3"><span class="text-black icon-twitter"></span></a>
            <a href="#" class="mr-0"><span class="text-black icon-linkedin"></span></a>
          </div>
        </div>
      </div>
      
    </div>
    <div class="site-navbar">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class=""><a href="index.html" class="h5 text-uppercase text-black"><strong>SaiGonHome<span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li>
                    <a href="{{URL::to('/home')}}">Trang chủ</a>
                  </li>
                   <li><a href="{{URL::to('/add-bds')}}">Gửi BDS</a></li>
                   <li><a href="{{URL::to('/tintuc')}}">Tin tức</a></li>
                   <?php $id =Session::get('idsell');
                        if(!isset($id)){?>
                  <li ><a href="{{URL::to('/dk-usersell')}}">Đăng nhập</a></li>
                        <?php } ?> 
                  <li >
                    <a class="item item-like active" href="{{URL::to('/all-luutin')}}"><span class="icon-heart-o"></span></a>
                   </li>  
                   <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
                
                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                        <img alt="" src="{{asset('fe_usersell/img/64572.png')}}" height="30" width="30">
                        <span class="username">
                           <?php
                                $name = Session::get('tensell');
                                $id =Session::get('idsell');
                                if($name)
                                {
                                  echo $name;
                                  echo $id;
                                 
                                }
                               ?> 
                        </span>
                        
                    </a>
                    <?php if(isset($id)){?>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="{{URL::to('/edit-usersell')}}"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
                        <li><a href="{{URL::to('/logout-usersell')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
                    </ul>
                  <?php } ?>  
                  </li>

                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

   <!--  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(frontend/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Our Blog</h1>
            <div><a href="">Home</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Blog</strong></div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container"> -->
        <!-- khoi tin tuc -->

        <!-- div class="row mb-5">
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <a href="#"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">When To Sell &amp; How Much To Sell?</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias enim, ipsa exercitationem veniam quae sunt.</p>
            </div>
          </div>
        </div> -->
          @yield('us_content')
       <!-- khoi tin tuc -->
       
    
    <!--   </div>
    </div>
 -->
  
    

    <div class="site-section site-section-sm bg-primary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Bất Động Sản SaiGonHome</h2>
            <p class="lead text-white-5">Nơi kết nối mọi người lại với nhau</p></p>
          </div>
          <div class="col-md-4 text-center">
            <a href="#" class="btn btn-outline-primary btn-block py-3 btn-lg">Menu</a>
          </div>
        </div>
      </div>
    </div>
    

     <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Giới thiệu SaiGonHome</h3>
              <p>Thiết kế một website hướng đến trở thành một siêu thị thông tin địa ốc trong đó không chỉ thực hiện tốt các dịch vụ kinh doanh bất động sản, khai thác thị trường tiềm năng, mà sẵn sàng tư vấn cho khách hàng về quy hoạch, thủ tục pháp lý, chính sách tài chính trong lĩnh vực bất động sản.</p>
            </div>
            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Trang chủ</a></li>
                  <li><a href="#">Mua</a></li>
                  <li><a href="#">Bán</a></li>
                  <li><a href="#">Bài đăng</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Thông tin </a></li>
                  <li><a href="#">Chính sách</a></li>
                  <li><a href="#">Liêm hện</a></li>
                  <li><a href="#">Terms</a></li>
                </ul>
              </div>
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Theo dõi chúng tôi</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>

            

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;</script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>

  </div>

  <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
  <script src="{{asset('frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/mediaelement-and-player.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('frontend/js/aos.js')}}"></script>

  <script src="{{asset('frontend/js/main.js')}}"></script>

  <!-- ------------------------------------------------ -->
  <!--usersell  -->
  <script src="{{asset('fe_usersell/js/bootstrap.js')}}"></script>
  <script src="{{asset('fe_usersell/js/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('fe_usersell/js/scripts.js')}}"></script>
  <script src="{{asset('fe_usersell/js/jquery.slimscroll.js')}}"></script>
  <script src="{{asset('fe_usersell/js/jquery.nicescroll.js')}}"></script>
  <script src="{{asset('fe_usersell/js/jquery.scrollTo.js')}}"></script>
    <!--usersell  -->
     <!--floder fe_support  -->
  <script src="{{asset('fe_support/js/jquery.js')}}"></script>
  <script src="{{asset('fe_support/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('fe_support/js/jquery.scrollUp.min.js')}}"></script>
  <script src="{{asset('fe_support/js/price-range.js')}}"></script>
  <script src="{{asset('fe_support/js/jquery.prettyPhoto.js')}}"></script>
  <script src="{{asset('fe_support/js/main.js')}}"></script>  
     <!--floder fe_support  -->
    
  </body>
</html>