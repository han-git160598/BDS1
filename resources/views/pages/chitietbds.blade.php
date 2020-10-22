@extends('layout_ql_bd')
@section('us_content') 
<style>
  #map {
      height: 300px;
      width: 100%;
  }
</style>
<script
src="https://maps.googleapis.com/maps/api/js?v=3&libraries=geometry,places&language=vi-VN&key=AIzaSyDLlnLyGsl0e5MZzX4SKua7WQx_9hCeCZY&callback=initMap"
defer></script>


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{URL::to('frontend/images/hero_bg_1.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Thông tin chi tiết</span>
             @foreach($all_baidang as $value)
            <h1 class="mb-2">{{$value->tenbd}}</h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{$value->giabd}} Tỷ</strong></p>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    
    <input type="hidden" id="latbd" value="{{ $value->lat }}">
    <input type="hidden" id="lngbd" value="{{ $value->lng }}">
    <div class="site-section site-section-sm ">
      <div class="container">
        
        @foreach($all_baidang as $value)
        <div class="row">
          
          <div class="col-lg-8" >
            <div class="mb-5">
             
              <div class="slide-one-item home-slider owl-carousel">
                
               @foreach($all_hinh as $k=>$v)
                <div>
                  <figure>
                    <img  src="{{URL::to('aaa/uploads/'.$v->urlhinh)}}" height="500" width="450" alt="Image" >
                  </figure>
                </div>
                @endforeach     
              </div>
            </div>
            <div class="bg-white"> 
              <div class="row mb-5">
                <div class="col-md-6">
                  <input type="hidden" name="luuvet" value="{{$value->idbd}}" id="idvet">
                  <strong class="text-success h1 mb-3">{{$value->tenbd}}</strong>
                  <div id="fb-root"></div>
                  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="arI3iH9W"></script>
                  <div class="fb-share-button" data-href="{{URL::to('chi-tiet-bds/'.$value->idbd)}}" data-layout="button" data-size="large" >
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a> 
                  </div>
                   <div class="fb-like" data-href="{{URL::to('chi-tiet-bds/'.$value->idbd)}}" data-width="" data-layout="box_count" data-action="like" data-size="small" data-share="false"></div>
                </div>

                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">{{$value->phongngu}}<sup>+</sup></span>
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">{{$value->nhatam}}</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Diện tích</span>
                    <span class="property-specs-number">{{$value->dientich}} m<sup>2</sup></span>
                    
                  </li>
                </ul>
                <ul>
                  <li>
                    <span class="property-specs">Ngày đăng:{{$value->thoigian}}</span>
                  </li>
                  <li>
                    <span class="property-specs">Người đăng:
                    @if($value->capdosell == 1)
                    Quản trị
                    @else
                    Đối tác
                    @endif  
                    </span>
                  </li>
                </ul>

<ul>
  <li>
  <h3>{{round($value->danhgia,2)}} Đánh giá</h3>
  </li>
  <li>
  <div id="rating">
      <input type="radio" id="star5" name="rating" value="5" onchange ="calcRate(this.value)" />
      <label class = "full" for="star5" title="Awesome - 5 stars"></label>
   
      <input type="radio" id="star4" name="rating" onchange ="calcRate(this.value)" value="4" />
      <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
   
      <input type="radio" id="star3" name="rating" onchange ="calcRate(this.value)" value="3" />
      <label class = "full" for="star3" title="Meh - 3 stars"></label>
   
      <input type="radio" id="star2" name="rating" onchange ="calcRate(this.value)" value="2" />
      <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
   
      <input type="radio" id="star1" name="rating" onchange ="calcRate(this.value)" value="1" />
      <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
  </div>
  </li>
</ul>

                </div>

              </div>
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Địa chỉ</span>
                  <strong class="d-block">{{$value->diachibd}}</strong>
                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Khu vực</span>
                  <strong class="d-block">{{$value->diachiall}}</strong>
                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Giá tiền</span>
                  <strong class="d-block">{{$value->giabd}} Tỷ ~</strong>
                </div>
              </div>

              <input type="hidden" id="idbd" name="" value="{{$value->idbd}}">
               <input type="hidden" id="idsell" name="" 
               value="<?php $a= Session::get('idsell');if($a){echo $a;} ?>">

              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Loại hình giao dịch</span>
                  @if($value->loaibd == 0)
                  <strong class="d-block">{{$value->tendanhmuc}} / Cho thuê</strong>
                  @else
                  <strong class="d-block">{{$value->tendanhmuc}} / Bán</strong>
                  @endif

                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Phone liên hệ</span>
                  <strong class="d-block"><span class="text-black fl-bigmug-line-phone351"></span> {{$value->sdtbd}}</strong>
                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  
                  <button type="btn" onclick="luutin()" class="btn btn-fefault cart">    
                    <span class="icon-heart-o"></span>
                    Lưu tin
                  </button>
                  <div id="luutin1"></div>
                </div>
              </div>
              <h2 class="h4 text-black">Thông tin chi tiết</h2>
              <p> @if($value->mattien == 1)
                <strong class="d-block">Mặt tiền</strong>
                @else
                <strong class="d-block">Nhà hẻm</strong>
                @endif</p>
                <p> @if($value->oto == 1)
                  <strong class="d-block">Xe hơi vào được</strong>
                  @else
                  <strong class="d-block">Xe hơi không vào được</strong>
                  @endif</p>
                  <p>Số tầng: {{ $value->sotang }}</p>
                  <p>Chiều ngang: {{ $value->chieungang }} m</p>
              <script >

          function luutin() 
            {
              var idbd_lt= $('#idbd').val();
              var idsell_lt=$('#idsell').val();
              //console.log(idbdbl);
              $.ajax({
              type: "GET", 
               url: "{{URL::to('save-luutin')}}", 
              data: {idbdd : idbd_lt, idselll: idsell_lt },
              dataType: "json",
              success: function (response) 
                   {
                    alert(response['mes']);
                    }
              });
            }

          </script>
              <!-------------------------------------------------------------- -->
         <div class="category-tab shop-details-tab">
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <li  class="active" ><a href="#details" data-toggle="tab">Mô tả</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Bình luận (Facebook)</a></li>
                <li><a href="#reviews" data-toggle="tab">Bình luận</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade active in " id="details" >
                
              <p>{{$value->motabd}}</p>
      
                
              </div>
              
              <div class="tab-pane fade" id="companyprofile" >
                
              <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0" nonce="Z9eGZkPY"></script>
     
      <div class="fb-comments" data-href="{{URL::to('chi-tiet-bds/'.$value->idbd)}}" data-numposts="5" data-width=""></div>
                
              </div>
              
              
              
              <div class="tab-pane fade " id="reviews" >
                <div class="col-sm-12" >
                  <div id="allbinhluan">
                 @foreach($binhluan as $v)
                 <?php
                  if($a==$v->idsell)
                  {
                 ?>
                  <div id="{{ $v->idbinhluan }}"><ul>
                    <li><a href=""><i class="fa fa-user">{{$v->tensell}}</i></a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>25 DEC 2019</a></li> 
                  </ul>
                  <p>{{$v->noidung}}</p>
                  <button type="button" value="{{$v->idbinhluan}}" onclick="xoabl(this.value)">Xóa</button>
                  <button type="button" value="{{$v->idbinhluan}}" onclick="suabl(this.value)">Sửa</button>  
                  </div>
                  <?php 
                  }else {
                  ?>
                  <ul>
                    <li><a href=""><i class="fa fa-user">{{$v->tensell}}</i></a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>25 DEC 2019</a></li> 
                  </ul>
                  <p>{{$v->noidung}}</p>
                  <?php
                  } 
                  ?>

                  @endforeach
                </div>

                  <p><b>Viết đánh giá</b></p>
                  <small id="bl" class="text-danger"></small>
          
                   <?php
                              $message=Session::get('message');
                              if($message)
                              {
                                 echo $message;
                                 Session::put('message',null);
                              }
                            ?>
                    <span>
                      <input hidden="" type="text" value="<?php $a= Session::get('idsell');
                      if($a){echo $a;} ?>" id="idsell" name="idbuy" />
                       <input type="text" id="idbdbll" value="{{$value->idbd}}" name="idbd" hidden="" />
                    </span>
                    <textarea cols="30" id="ndbll" rows="30" name="noidung" ></textarea>
                   
                    <button type="btn"  onclick="addbl()" name="add_binhluan" class="btn btn-default pull-right" >Gửi</button>
         
                  
                  
                </div>
              </div>
            </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
          <script >

          function addbl()
            {
              var idsell= $('#idsell').val();
              var idbdbl= $('#idbdbll').val();
              var noidung=$('#ndbll').val();
              var d = new Date();
              phut=d.getMinutes();
              gio=d.getHours();
              ngay=d.getDate();
              thang=d.getMonth();
              nam=d.getFullYear();
              //console.log(idbdbl);
              if(idsell =='')
              {
                $('#bl').html('vui lòng đăng nhập để tiếp tục')
              } 
              else{
              $.ajax({
              type: "GET", 
               url: "{{URL::to('save-binhluan')}}",
              data: {idbdbiluan : idbdbl, idsellbl: idsell, noidungbinhluan: noidung},
              dataType: "json",
              success: function (response) 
                   {
                    var output="";
                      response.forEach(function(item)
                         {                   
                            output+=`<div id="${item.idbinhluan}"><ul>
                    <li><a href=""><i class="fa fa-user">${item.tensell}</i></a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>${gio}:${phut}</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>${ngay}/${thang}/${nam}</a></li>
                  </ul>
                  <p>${item.noidung}</p>`;
                  if(idsell==item.idsell)
                  {
                    output+=`<button type="button" value="${item.idbinhluan}" onclick="xoabl(this.value)">Xóa</button>`;
                    output+=`<button type="button" value="${item.idbinhluan}" onclick="suabl(this.value)">Sửa</button>`;
                  }
                  output+=`</div>` ;   
                        });
                      $('#allbinhluan').html(output);
                    }
              });
            }
            }
            function xoabl(id)
            {
              idbl=id;
             
              
              var r = confirm("Bạn có chắc muốn xóa bình luận này");
              if (r == true) {
                $.ajax({
                  type: "GET",
                  url: "{{URL::to('delete-binhluan')}}",
                  data: {idbl1 : idbl},
                  dataType: "json",
                  success: function (response) 
                    {
                      var parent = document.getElementById("allbinhluan");
                      var child = document.getElementById(id);
                      parent.removeChild(child);
                    }
                });
              } else {}
            }
            function suabl(id){
              idbl=id;
              var idbdbl= $('#idbdbll').val();
              var noidung=$('#ndbll').val();
              var d = new Date();
              phut=d.getMinutes();
              gio=d.getHours();
              ngay=d.getDate();
              thang=d.getMonth();
              nam=d.getFullYear();
           
              if (idbl != '') {
                $.ajax({
                  type: "GET",
                  url: "{{URL::to('sua-binhluan')}}",
                  data: {idbl1 : idbl, idbdbl1:idbdbl,noidung1:noidung},
                  dataType: "json",
                  success: function (response) 
                    {
                      var parent = document.getElementById("allbinhluan");
                      var child = document.getElementById(id);
                      parent.removeChild(child);
                    }
                });
              } else {}
            }
          </script>
 <!-- ----------------------------------------------------------------------- -->

            

              <div class="row mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3"></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 pl-md-5">
            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3">Đặt lịch hẹn</h3>
              <span class="rounded"><?php
                  $message=Session::get('message');
                    if($message)
                    {
                    echo $message;
                    Session::put('message',null);
                    }
              ?></span>
             
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" onkeyup="KT_name(this.value)" id="name" name="tenkh" class="form-control">
                  <small id="mes_name" class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" onkeyup="KT_email(this.value)" id="email" name="emailkh" class="form-control">
                   <small id="mes_email" class="text-danger"></small>
                </div>
                <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input type="text" onkeypress='return event.charCode >= 47 && event.charCode <= 57' onkeyup="KT_sodienthoai(this.value)" name="sdtbd" class="form-control"  id="sodienthoai" placeholder="Số điện thoại" maxlength="10">
                  <small id="ersodienthoai" class="text-danger"></small>
                </div>

                <div class="form-group">
                  <label for="email">Thời gian</label>
                  <input type="datetime-local"  id="date" onchange="KT_date(this.value)"  name="thoigianhen" class="form-control">
                  <small id="erdate" class="text-danger"></small>
                </div>
                <div>
                  <input hidden="" id="trangthai" type="text" name="trangthai_lh" value="0"  id="phone" class="form-control">
                </div>
                <div>
                  <input hidden="" id="idbd" type="text" name="idbd" value="{{$value->idbd}}"  id="phone" class="form-control">
                </div>
                <p id="demo13"></p>
                <menu>
                  <center><button type="btn"  id="updateDetails"  onclick="add_lh()" name="add_binhluan" class="btn btn-primary" >Đặt lịch</button></center>
                </menu>
         

      <dialog id="favDialog">
        <form method="dialog">
          <p><label>Mã OTP
            <input id="otp" type="text" >
          </label></p>
          <p>Nhập mã OTP đã được gửi vào mail của bạn</p>
          <small id="demo13" class="text-danger"></small>
          <menu>
            <button value="cancel">Hủy</button>
            <button id="confirmBtn">Xác nhận</button>
          </menu>
        </form>
      </dialog>
      <p id="maotp"></p>
     <!--  <p id="demo13">s</p> -->
<output aria-live="polite"></output>
<!-- ------------------------------- -->
            </div>

            <div class="bg-white widget border rounded">
              <h2 class="h4 text-black widget-title mb-3">Tiện ích</h2>
              <ul>
                @foreach($tienich as $v)          
                  <li>{{$v->tentienich}}</li>
                @endforeach
              </ul>
            </div>
            <div id="map"></div>
            
            
          </div>

          
        </div>
        @endforeach
      </div>
    </div> 
<!-- -------------------san pham lien quan -->
    <div class="site-section site-section-sm bg-light">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2>Bất động sản liên quan</h2>
            </div>
          </div>
        </div>
    
        <div class="row mb-5">
            @foreach($bds_lienquan as $v)
          <div class="col-md-6 col-lg-4 mb-4">
            <a href="{{URL::to('/chi-tiet-bds/'.$v->idbd)}}" class="prop-entry d-block">
              @foreach($all_hinh1 as $a)
              @if($v->idbd == $a->idbd)
              <figure>
                <img src="{{URL::to('aaa/uploads/'.$a->urlhinh)}}"  height="250" width="450">
              </figure>
              @break 
              @endif
              @endforeach
              <div class="prop-text">
                <div class="inner"> 
                  <span class="price rounded">{{$v->giabd}} Tỷ</span>
                  <h3 class="title">{{$v->tenbd}}</h3>
                  <p class="location">Đường {{$v->diachibd}}</p>
                  <span class="title">
                  @if($value->loaibd == 0)
                  <span class="offer-type bg-danger">Thuê</span>
                  @else
                  <span class="offer-type bg-success"
                  >Bán</span>
                  @endif
                </span>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Diện tích:</span>
                      <strong>{{$v->dientich}}<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span>Beds:</span>
                      <strong>{{$v->phongngu}}</strong>
                    </div>
                    <div class="col">
                      <span>Baths:</span>
                      <strong>{{$v->nhatam}}</strong>
                    </div>
                    <div class="col">
                      <span>Quận:</span>
                      <strong></strong>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
       @endforeach
        </div>
        <div class="row" >
        <div class="col-md-12 text-center">
          <div class="col-sm-7 text-right text-center-xs">         
  
       
                {{ $bds_lienquan->links() }}
                
           
            </div>
        </div>  
      </div>

      </div>
  <!--     <div id="result"></div>
 
<script>
// Kiểm tra trình duyệt có hỗ trợ local storage không
if (typeof(Storage) !== "undefined") {
// Lưu trữ
localStorage.setItem("website", "webvn.com");
// Lấy dữ liệu
document.getElementById("result").innerHTML = localStorage.getItem("website");
} else {
document.getElementById("result").innerHTML = "Rất tiếc, trình duyệt của bạn không hỗ trợ local storage...";
}
</script> -->
      <script type="text/javascript">

        $(document).ready(function(){
          var index =$('#idvet').val();
          var idbd=$('#idvet').val();
         // $("[name='luuvet']"). click(function(){
          sessionStorage.setItem(index,idbd);
          });

      //    });  
      function KT_name(){
              var name1= $('#name').val();
              if(name1=='')
              {
                flag=1;
                $('#mes_name').html('Không được bỏ trống')

              }else
              {
                $('#mes_name').html('')
              }
              
            }
      function KT_email(){
         var email1= $('#email').val();
          if(email1=='')
            {
              flag=1;
              $('#mes_email').html('Không được bỏ trống')
            }else{
              $('#mes_email').html('')
            } 
      }

      function KT_sodienthoai(sdt)
        {
            if(sdt.length<10 || sdt.length>10)
            {
                $('#ersodienthoai').html('Số điện thoại gồm 10 số');
            }
            else
            {
                $('#ersodienthoai').html('');
            }

        }
        function KT_date()
        {
          var date1= $('#date').val();
          var date2 = new Date(date1);
          var today = new Date();  
          //console.log(date2);
          if(date2 < today)
          {
            $('#erdate').html('Ngày hẹn phải là tương lai');
          }
          else
          {
            $('#erdate').html('');
          }
        }
        function add_lh()
            { var flag=0;
              var name1= $('#name').val();
              var email1= $('#email').val();
              var idbd1=$('#idbd').val();
              var trangthai1=$('#trangthai').val();
              var phone1=$('#sodienthoai').val();
              var date1=$('#date').val();
               if(name1=='')
              {
                flag=1;
                $('#mes_name').html('Không được bỏ trống')

              }else
              {
                $('#mes_name').html('')
              }
              if(email1=='')
              {
                flag=1;
                $('#mes_email').html('Không được bỏ trống')
              }else{
                $('#mes_email').html('')
              } 
              if(phone1=='')
              {
                flag=1;
                $('#ersodienthoai').html('Không được bỏ trống')
              }else{
                $('#ersodienthoai').html('')
              } 
             
              if(flag == 1)
              { 
              } 
              else{
//var updateButton = document.getElementById('updateDetails');
var favDialog = document.getElementById('favDialog');
var outputBox = document.querySelector('output');
var confirmBtn = document.getElementById('confirmBtn');

//updateButton.addEventListener('click', function onOpen() {
  function TaoSoNgauNhien(min, max){
            return Math.floor(Math.random() * (max - min)) + min;
        }
    const a = TaoSoNgauNhien(1001, 9999);
    $('#maotp').html(a);
 
  if (typeof favDialog.showModal === "function") {
    favDialog.showModal();
    var idopt = ($('#maotp').html());
    var email2= $('#email').val();

    $.ajax({
              type: "POST",
               url: "{{URL::to('otp-mail')}}",
              data: {maotp:idopt, emailkh:email2},
                       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

              dataType: "json",
              success: function (response) 
                   {
                    //alert(response['mes']);
                    }
              });


  } else {
    alert("The <dialog> API không được hỗ trợ bởi trình duyệt nè");
  }
//});
//const abc = $('#otp').html(); 
var idopt = ($('#maotp').html());
var text = document.getElementById('otp');

confirmBtn.addEventListener('click', function onSelect() {
  if(text.value== idopt ){
  $('#demo13').html('Mã OTP hợp lệ')
  confirmBtn.value =idopt.value;
          $.ajax({
              type: "GET",
              url: "{{URL::to('save-lichhen')}}",
              data: {tenkh : name1, emailkh: email1, idbd: idbd1,trangthai_lh: trangthai1, sdtkh:phone1 , thoigianhen: date1},
              dataType: "json",
              success: function (response) 
                   {
                    alert(response['mes']);
                    }
              });
  
}else{
  $('#demo13').html('Mã OTP không hợp lệ')
  }
});
favDialog.addEventListener('close', function onClose() {
  outputBox.value = favDialog.returnValue;
});
              
            }
          }


          function calcRate(r) {
            var idbd1= $('#idvet').val(); 
           /* const f = ~~r,//Tương tự Math.floor(r)
            id = 'star' + f + (r % f ? 'half' : '')
            id && (document.getElementById(id).checked = !0)*/
        $.ajax({
              type: "GET",
              url: "{{URL::to('save-rating')}}",
              data: {rated: r, idbd2:idbd1 },
              dataType: "json",
              success: function (response) 
                  {
                    alert(response['mes']);
                  }

              });


}
function initMap() {
  xlat=$('#latbd').val();
  xlng=$('#lngbd').val();
  x=Number(xlat);
  y=Number(xlng);
  geocode= {lat:x,lng:y};
  mapbds = new google.maps.Map(document.getElementById("map"), {
    center:geocode,
    zoom: 13,
    mapTypeId: "roadmap"
  }); 
    var marker= new google.maps.Marker({
        position:geocode,
        map:mapbds
    });
}


      </script>





@endsection