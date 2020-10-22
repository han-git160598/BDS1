@extends('layout_ql_bd')
@section('us_content') 

  

      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(frontend/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <h1 class="mb-2">Đăng nhập</h1>
              <div><a href="{{URL::to('/home')}}">Trang chủ</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Tin tức</strong></div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section site-section-sm bg-dark">
        <div class="container">

            <div class="text-center social-btn">
            <a href="{{URL::to ('/login/facebook') }}" class="btn btn-secondary"><i class="fa fa-facebook"></i>&nbsp;Đăng nhập qua Facebook</a>
           <a href="{{URL::to ('/login/google') }}" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp;Đăng nhập qua Google</a>
           </div>
          <!-- khoi tin tuc -->
          <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form"><!--login form-->
            <h2><center><span style="color: red"> <?php
                              $message=Session::get('message');
                              if($message)
                              {
                                 echo $message;
                                 Session::put('message',null);
                              }
                            ?></span></center> </h2>
            <h2>Đăng nhập  </h2>
            <form action="{{URL::to ('/login-usersell') }}" method="get">
              {{ csrf_field() }}
              <input type="text" name="emailsell" placeholder="Tài Khoản" />
              <input type="password" name="passwordsell" placeholder="Password" />
              <span>
                <!-- <input type="checkbox" class="checkbox"> 
                Lưu tài khoản -->
              </span>
              <button type="submit" class="btn btn-default">Đăng Nhập</button>
            </form>
          </div>
        </div>

        <div class="col-sm-1">
          <h2 class="or">Hoặc</h2>
        </div>
        <div class="col-sm-4">

          <div class="signup-form"><!--sign up form-->
            <h2><center><span style="color: red"> <?php
                              $message=Session::get('message');
                              if($message)
                              {
                                 echo $message;
                                 Session::put('message',null);
                              }

                            ?></span></center> </h2>

            <h2>Đăng ký</h2>
             <small id="demo13" class="text-danger"></small>
            <form>
              
              <label for="exampleInputEmail1"><span style="color: blue">Họ & tên</span></label>
              <small id="mes_name" class="text-danger"></small>
              <input type="text" onkeyup="KT_name(this.value)" id="name" name="tensell" placeholder="Họ và tên" />
              

              <label for="exampleInputEmail1"><span style="color: blue">Tài khoản email</span></label>
               <small id="mes_email" class="text-danger"></small>
              <input type="email" onkeyup="KT_email(this.value)" id="email" name="emailsell" placeholder="Tài Khoản"/>
             

              <label for="exampleInputEmail1"><span style="color: blue">Mật khẩu</span></label>
               <small id="mes_pass" class="text-danger"></small>
              <input type="password" onkeyup="KT_pass(this.value)" id="pass" name="passwordsell" placeholder="Password"/>
             

              <label for="exampleInputEmail1"><span style="color: blue">Số điện thoại</span></label>
              <small id="ersodienthoai" class="text-danger"></small>
              <input type="text"  onkeypress='return event.charCode >= 47 && event.charCode <= 57' onkeyup="KT_sodienthoai(this.value)"  id="sodienthoai" maxlength="10" name="sdtsell" placeholder="Số điện thoại" />
              

               <label for="exampleInputEmail1"><span style="color: blue">Ngày sinh</span></label>
              <input type="date" id="date" name="ngaysinhsell" placeholder="Ngày Sinh" />
            </form>
            <menu>
              <center><button type="btn"  id="updateDetails"  onclick="dangky()" name="add_binhluan" class="btn btn-primary" >Đăng Ký</button></center>
            </menu>
       
          </div><!--/sign up form-->
        </div>
      </div>
         <p id="maotp"><span style="color: red">OTP</span></p>   
         <!-- khoi tin tuc -->
         

         

      <dialog id="favDialog">
        <form method="dialog">
          <p><label>Mã OTP
            <input id="otp" type="text" >
          </label></p>
          <p>Nhập mã OTP đã được gửi vào mail của bạn</p>
          <menu>
            <button value="cancel">Hủy</button>
            <button id="confirmBtn">Xác nhận</button>
          </menu>
        </form>
      </dialog>
      
     <!--  <p id="demo13">s</p> -->
<output aria-live="polite"></output>
         
      
        </div>
      </div>

 <script type="text/javascript">
       

        $(document).ready(function(){
          var index =$('#idvet').val();
          var idbd=$('#idvet').val();
         // $("[name='luuvet']"). click(function(){
          sessionStorage.setItem(index,idbd);
          });

      //    });  

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
     


 function dangky()
            { var flag=0;
              var name1= $('#name').val();
              var email1= $('#email').val();
              var phone1=$('#sodienthoai').val();
              var date1=$('#date').val(); 
              var pass1= $('#pass').val();
              if(name1=='')
              {
                flag=1;
                $('#mes_name').html('Không được bỏ trống')

              }else
              {
                $('#mes_name').html('')
              }
              if(pass1=='')
              {
                flag=1;
                $('#mes_pass').html('Không được bỏ trống')

              }else
              {
                $('#mes_pass').html('')
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
              url: "{{URL::to('save-usersell')}}",
              data: {tenkh : name1, email: email1, pass: pass1, sdt:phone1 , ngaysinh: date1},
              dataType: "json",
              success: function (response) 
                   {
                      if(response['mes']=='Tài khoản đã tồn tại !!'){
                      alert(response['mes']);
                      }else{
                        window.location.href = "{{URL::to('/home')}}";
                      }
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


 </script>











@endsection