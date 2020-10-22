<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SaiGonHome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- -----------------fe_support----------------------- -->
    <!-- <link href="{{asset('fe_support/css/bootstrap.min.css')}}" rel="stylesheet">
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
    <link rel="apple-touch-icon-precomposed" href="{{('fe_support/img/apple-touch-icon-57-precomposed.png')}}"> -->
    <!-- --------------------------------------- -->
    
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
              <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">0999999999</span></a>
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
                  <li class="active">
                    <a href="{{ URL::to('/home') }}">Trang chủ</a>
                  </li>
                 <!--  <li class="has-children">
                    <a href="properties.html">Bất động sản</a>
                    <ul class="dropdown">
                      <li><a href="#">Chung Cư</a></li>
                      <li><a href="#">Nhà riêng</a></li>
                    </ul>
                  </li> --> 

                  <li><a href="{{URL::to('/tintuc')}}">Tin tức</a></li>
                  <li><a href="{{URL::to('/add-bds')}}">Gửi BDS</a></li>
                  <?php $id =Session::get('idsell');
                        if(!isset($id)){?>
                  <li ><a href="{{URL::to('/dk-usersell')}}">Đăng nhập</a></li>
                        <?php } ?> 
                 
         
                  <li>
                    <a class="item item-like active" href="{{URL::to('/all-luutin')}}"><span class="icon-heart-o"></span></a>
                  </li> 
                  <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>


                  <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                        <img alt="" src="{{asset('fe_usersell/img/64572.png')}}" height="30" width="30">
                        <span class="username">
                           <?php
                                $name =Session::get('tensell');
                                $id =Session::get('idsell');
                                if($name)
                                {
                                  echo $name; 
                                  echo $id;
                                }
                               ?> 
                        </span>
                        <b class="caret"></b>
                    </a>
                   <?php if(isset($id)){?>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="{{URL::to('/edit-usersell')}}"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
                        <li><a href="{{URL::to('/logout-usersell')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
                    </ul>
                  <?php } ?>
                  </li>
                  




                <!-- <li>
                  <menu>
                     <button id="dangky" class="btn btn-info">Đăng ký</button>
                  </menu>
                </li> -->
              <!-- ------------------------------------- -->
        
       <!--    <dialog id="favDialog">
            <form method="dialog" >

              <div class="form-group">
                  <label for="exampleInputEmail1"><h3><center>Form đăng ký</center></h3></label>
                  <input type="text" name="tensell" class="form-control" id="exampleInputEmail1" placeholder="Họ và tên">
              </div>
              <div class="form-group">
              
                  <input type="email" name="emailsell" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                 
                  <input type="text" name="passwordsell" class="form-control" id="exampleInputEmail1" placeholder="Mật khẩu">
              </div>
              <div class="form-group">
                  <input type="text" name="sdtsell" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">
              </div>
            
              <menu>
                <button type="submit" id="dk" name="dk_taikhoan" onclick="return confirm('Bạn có tạo tài khoản  ?')" class="btn btn-info">Tạo tài khoản</button>
                <button id="dk">Confirm</button>
                <button id="Cancel">Cancel</button>
              </menu>
            </form>
          </dialog>

          <script type="text/javascript">
          (function() {
            var dangkyButton = document.getElementById('dangky');
            var favDialog = document.getElementById('favDialog');
            var dk = document.getElementById('dk');

            // “Update details” button opens the <dialog> modally
            dangkyButton.addEventListener('click', function() {
              favDialog.showModal();

              

              
            });
          
          })();

          </script>
 -->



              <!-- ------------------------------- -->

                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover" style="background-image: url(/frontend/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">

       <div class="text">
          <h2>Bất động sản SaiGonHome</h2>
          <a target="_blank" href='https://www.google.com/maps/search/115 Phạm Hữu Lầu,Quận 7,TP.HCM'><i class="fa fa-map-marker"><span class="property-icon icon-room"></span></i>115 Phạm Hữu Lầu, Quận 7</a>

          <p class="mb-2"><strong>Phone: 0999999999</strong></p>
          
          
          <p class="mb-0"><a href="#" class="text-uppercase small letter-spacing-1 font-weight-bold">Email: bds.saigonhome@gmail.com</a></p>
          
        </div>
      </div>  

      <div class="site-blocks-cover" style="background-image: url(/frontend/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">

        <div class="text">
          <h2>Bất động sản SaiGonHome</h2>
          <a target="_blank" href='https://www.google.com/maps/search/115 Phạm Hữu Lầu,Quận 7,TP.HCM'><i class="fa fa-map-marker"><span class="property-icon icon-room"></span></i>115 Phạm Hữu Lầu, Quận 7</a>

          <p class="mb-2"><strong>Phone: 0999999999</strong></p>
          
          
          <p class="mb-0"><a href="#" class="text-uppercase small letter-spacing-1 font-weight-bold">Email: bds.saigonhome@gmail.com</a></p>
          
        </div>
        
      </div>

      <div class="site-blocks-cover" style="background-image: url(/frontend/images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">

        <div class="text">
          <h2>Bất động sản SaiGonHome</h2>
          <a target="_blank" href='https://www.google.com/maps/search/115 Phạm Hữu Lầu,Quận 7,TP.HCM'><i class="fa fa-map-marker"><span class="property-icon icon-room"></span></i>115 Phạm Hữu Lầu, Quận 7</a>

          <p class="mb-2"><strong>Phone: 0999999999</strong></p>
          
          
          <p class="mb-0"><a href="#" class="text-uppercase small letter-spacing-1 font-weight-bold">Email: bds.saigonhome@gmail.com</a></p>
          
        </div>
        
      </div>

      <div class="site-blocks-cover" style="background-image: url(/frontend/images/hero_bg_4.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">

        <div class="text">
          <h2>Bất động sản SaiGonHome</h2>
          <a target="_blank" href='https://www.google.com/maps/search/115 Phạm Hữu Lầu,Quận 7,TP.HCM'><i class="fa fa-map-marker"><span class="property-icon icon-room"></span></i>115 Phạm Hữu Lầu, Quận 7</a>

          <p class="mb-2"><strong>Phone: 0999999999</strong></p>
          
          
          <p class="mb-0"><a href="#" class="text-uppercase small letter-spacing-1 font-weight-bold">Email: bds.saigonhome@gmail.com</a></p>
          
        </div>
        
      </div>  

    </div>


    <div class="py-5">
      <div class="container" id="timkiem">
      

       



       <!-- ------ -->

       <!--  <div class="row">
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-house"></span>
              <div class="text">
                <h2 class="mt-0">Wide Range of Properties</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-rent"></span>
              <div class="text">
                <h2 class="mt-0">Rent or Sale</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-location"></span>
              <div class="text">
                <h2 class="mt-0">Property Location</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

   
    <div class="site-section site-section-sm bg-light">
      <div class="container">

         @yield('content') 
        </div>  
    </div>
 
<!-- 
    <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center mb-5">
            <div class="site-section-title">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-house"></span>
              <h2 class="service-heading">Research Subburbs</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-sold"></span>
              <h2 class="service-heading">Sold Houses</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="#" class="service text-center border rounded">
              <span class="icon flaticon-camera"></span>
              <h2 class="service-heading">Security Priority</h2>
              <p><span class="read-more">Learn More</span></p>
            </a>
          </div>
        </div>
      </div>
    </div> -->

   <!-- tin tuc -->
   
  <!--  <div class="site-section site-section-sm bg-light">
      <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-7 text-center mb-5">
            <div class="site-section-title">
              <h2>Tin tức bất động sản</h2>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="slide-one-item home-slider owl-carousel"> 
          @foreach($tintuc as $value)
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <a target="blank" href="{{URL::to($value->slug)}}"><img src="{{URL::to($value->hinhanh)}}" alt="Image" class="img-fluid" height="450" width="480" ></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase">Jan 20th, 2019</span>
              <h2 class="h5 text-black mb-3"><a href="#">{{$value->tieude}}</a></h2>
              <p>{{$value->mota}}</p>
            </div>
          </div>
          @endforeach
        </div> 
        </div>
       
     
      </div>
    </div> -->
 
  <div class="site-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2>Tin tức bất động sản</h2>
          </div>
        </div>
      </div>
      <div class="row block-13">

        <div class="nonloop-block-13 owl-carousel">
        @foreach($tintuc as $value)
          <div class="slide-item">
            <div class="team-member text-center">
            <!--   <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto"> -->
               <a target="blank" href="{{URL::to($value->slug)}}"><img src="{{URL::to($value->hinhanh)}}" alt="Image" class="mb-4 w-120 rounded-circle mx-auto" height="320" width="350" ></a>
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">{{$value->tieude}}</h2>
                <span class="d-block mb-3 text-white-opacity-05">https://blog.rever.vn</span>
                <p class="mb-5">{{$value->mota}}</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>
         @endforeach
        </div>

        </div>
      </div>
    </div>

<!-- ------------ -->
    
   <!--  <div class="site-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2>Our Agents</h2>
          </div>
        </div>
      </div>
      <div class="row block-13">

        <div class="nonloop-block-13 owl-carousel">

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">s. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="{{ asset('frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
            </div>
          </div>

        </div>

        </div>
      </div>
    </div> -->

    <div class="site-section site-section-sm bg-primary">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <h2 class="text-white">Bất Động Sản SaiGonHome</h2>
            <p class="lead text-white-5">Nơi kết nối mọi người lại với nhau</p>
          </div>
          <div class="col-md-4 text-center">
            <a href="#" class="btn btn-outline-primary btn-block py-3 btn-lg">Xem bài đăng</a>
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
   <!--floder fe_support  -->
<!--   <script src="{{asset('fe_support/js/jquery.js')}}"></script>
  <script src="{{asset('fe_support/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('fe_support/js/jquery.scrollUp.min.js')}}"></script>
  <script src="{{asset('fe_support/js/price-range.js')}}"></script>
  <script src="{{asset('fe_support/js/jquery.prettyPhoto.js')}}"></script>
  <script src="{{asset('fe_support/js/main.js')}}"></script>   -->
     <!--floder fe_support  -->
  
    
  </body>
</html>