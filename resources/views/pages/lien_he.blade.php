@extends('layout_ql_bd')
@section('us_content') 
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://127.0.0.1:8000/frontend/images/hero_bg_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Liên hệ</h1>
            <div><a href="index.html">Trang chủ</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Tin tức</strong></div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
          

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Họ tên</label>
                  <input type="text" id="ten" class="form-control" placeholder="Full Name">
                  <small id="mes_ten" class="text-danger"></small>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Email Address">
                  <small id="mes_email" class="text-danger"></small>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Vấn đề</label>
                  <input type="text" id="vd" class="form-control" placeholder="Enter Subject">
                  <small id="mes_vd" class="text-danger"></small>
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Nội dung</label> 
                  <textarea name="message" id="nd" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                  <small id="mes_nd" class="text-danger"></small>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <button type="btn"  onclick="lienhe()" name="add_binhluan" class="btn btn-primary" >Gửi</button>
                </div>
              </div>

  
            
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h6 text-black mb-3 text-uppercase">Thông tin liên hệ</h3>
              <p class="mb-0 font-weight-bold">Địa chỉ</p>
              <p class="mb-4">180 Cao Lỗ, Phường 4, Quận 8 , tp.HCM</p>

              <p class="mb-0 font-weight-bold">điện thoại</p>
              <p class="mb-4"><a href="#">0999999999</a></p>

              <p class="mb-0 font-weight-bold">Email</p>
              <p class="mb-0"><a href="#">bds.saigonhome@gmail.com</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </div>


    <script >

    function lienhe()
            { var flag=0;
              var ten1= $('#ten').val();
              var email1= $('#email').val();
              var vd1= $('#vd').val();
              var nd1=$('#nd').val();
             
              if(ten1=='')
              {
                flag=1;
                $('#mes_ten').html('Không được bỏ trống')

              }else
              {
                $('#mes_ten').html('')
              }
              if(email1=='')
              {
                flag=1;
                $('#mes_email').html('Không được bỏ trống')

              }else
              {
                $('#mes_email').html('')
              }

              if(vd1=='')
              {
                flag=1;
                $('#mes_vd').html('Không được bỏ trống')
              }else{
                $('#mes_vd').html('')
              } 
              if(nd1=='')
              {
                flag=1;
                $('#mes_nd').html('Không được bỏ trống')
              }else{
                $('#mes_nd').html('')
              } 
             
              if(flag == 1)
              { 
              } 
              else{
                $.ajax({
                  type: "GET",
                   url: "{{URL::to('gui-vande')}}",
                  data: {ten:ten1, emailkh:email1, vd:vd1, nd:nd1},
                  dataType: "json",
                  success: function (response) 
                       {
                        alert(response['mes']);
                        }
                  });
              }
}


 </script>








@endsection