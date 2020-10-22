@extends('layout_ql_bd')
@section('us_content') 

      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(frontend/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <h1 class="mb-2">Quản lý bài đăng</h1>
              <div><a href="{{URL::to('/all-bds/'.Session::get('idsell'))}}">Danh sách bài đăng</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white"><a href="{{URL::to('/add-bds/'.Session::get('idsell'))}}">Thêm bài viêt</a></strong><span class="mx-2 text-white">&bullet;</span> <strong class="text-white"><a href="{{URL::to('/all-lichhen/'.Session::get('idsell'))}}">Quản lý Lịch hẹn</a></strong>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section site-section-sm bg-light">
        <div class="container">
          <!-- khoi tin tuc -->
        
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin
                        </header>
                        <div class="panel-body">
                            <center><h2 style="color: red"> <?php
                              $message=Session::get('message');
                              if($message)
                              {
                                 echo $message;
                                 Session::put('message',null);
                              }
                            ?></h2> </center>
                            <div class="position-center">
                                @foreach($user as $value)
                                <form role="form" action="{{URL::to('/update-usersell/'.$value->idsell)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email: {{$value->emailsell}}</label>
                                </div>    
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ & Tên</label>
                                    <input type="text" value="{{$value->tensell}}" name="tenkh" class="form-control" id="exampleInputEmail1" placeholder="Tên user">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày sinh</label>
                                    <input type="date" value="{{$value->ngaysinhsell}}" name="ngaysinhkh" class="form-control" id="exampleInputEmail1" placeholder="Tên user">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="text" value="{{$value->passwordsell}}" name="passwordkh" class="form-control" id="exampleInputEmail1" placeholder="Tên user">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">số điện thoại</label>
                                    <input type="number" value="{{$value->sdtsell}}" name="sdtkh" class="form-control" id="exampleInputEmail1" placeholder="Tên user">
                                </div>                                                  
                                <button type="submit" name="add_baidang" onclick="return confirm('Bạn có muốn thay đổi thông tin  ?')" class="btn btn-info">Cập nhật</button>
                            </form>

                            @endforeach
                            </div>
                        </div>
                    </section>

            </div>
          </div>  
            
         <!-- khoi tin tuc -->
         
      
        </div>
      </div>

        

@endsection