@extends('admin_layout')
@section('admin_content')
<style>
    #map {
        height: 300px;
        width: 100%;
    }
  </style>
  <script
  src="https://maps.googleapis.com/maps/api/js?v=3&libraries=geometry,places&language=vi-VN&key=AIzaSyDLlnLyGsl0e5MZzX4SKua7WQx_9hCeCZY&callback=initMap"
defer></script>
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<div class="site-section site-section-sm bg-light">
        <div class="container">
        
        
        <div class="row">
            <div class="col-lg-10">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bài đăng
                        </header>
                        <div class="panel-body">
                            <?php
                              $message=Session::get('message');
                              if($message)
                              {
                                 echo $message;
                                 Session::put('message',null);
                              }
                            ?>
                            <div class="position-center">

                                <form role="form" id="myform" action="{{URL::to('/admin-save-bd')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <input type="hidden" name="idsell" value="{{ $idsell[0]->idsell }}">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="tenbd" class="form-control" id="tieude" placeholder="Tên tiêu đề">
                                    <small id="ertieude" class="text-danger"></small>
                                </div>
                                
                                

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" id="hinhanh" name="urlhinh[]" class="form-control" multiple="multiple" onChange="return fileValidation()" placeholder="Hình ảnh">
                                    <div id="imagePreview"></div>
                                    <small id="erhinhanh" class="text-danger"></small>
                                </div> 
                                
                                <!-- -- -->
                                <div  class="form-group">
                                    <input type="hidden" id="diachibaidang" name="diachibd">
                                    <input type="hidden" id="latbdd" name="latbd">
                                    <input type="hidden" id="lngbdd" name="lngbd">
                                    <input type="hidden" id="diachiallbd" name="diachiall">
                                    <label for="exampleInputEmail1">Địa chỉ cụ thể</label>
                                    <small id="erdiachicuthe" class="text-danger"></small>
                                    <input id="autoseach" type="text" placeholder="Search Box" class="form-control">
                                    <div id="map"></div>
                                </div>
                                
                                <!-- ---- -->

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình thức : </label>
                                         <select class="btn btn-info" name="loaibd"   >
                                                 <option value="0">Thuê</option>
                                                 <option value="1">bán</option>
                                                
                                         </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loại bất động sản</label>
                                    <select onChange="floaibds(this.value)" name="danhmucbd" id="loaibatdongsan" class="form-control input-sm m-bot15">
                                    <option value="">Chọn</option>
                                    @foreach($iddanhmuc as $value)
                                        <option value="{{$value->iddanhmuc}}">{{$value->tendanhmuc}}</option>
                                    @endforeach
                                     
                                    </select>
                                    <small id="erloaibatdongsan" class="text-danger"></small>
                                </div> 
                                <div id="chucnangtheoloai"></div> 
                                <div id="chucnangmattien"></div> 
                                <div class="quan">
                                    <div class="form-group">
                                     <label for="exampleInputPassword1">Phòng ngủ : </label>
                                         <select class="btn btn-info" name="phongngu"   >
                                                 <option value="1">1</option>
                                                 <option value="2">2</option>
                                                 <option value="3">3</option>
                                                 <option value="4">4</option>
                                                 <option value="5">5+</option>
                                                
                                         </select>
                                     </div>
                                    <div class="form-group">
                                     <label for="exampleInputPassword1">Phòng    tắm : </label>
                                         <select class="btn btn-info" name="phongtam"   >
                                                 <option value="1">1</option>
                                                 <option value="2">2</option>
                                                 <option value="3">3</option>
                                                 <option value="4">4</option>
                                                 <option value="5">5+</option>
                                                
                                         </select>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Diện tích(m²)</label>
                                    <input type="number" name="dientichbd" class="form-control" id="dientich" placeholder="Diện tích">
                                    <small id="erdientich" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại liên hệ</label>
                                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="KT_sodienthoai(this.value)" name="sdtbd" class="form-control"  id="sodienthoai" placeholder="Số điện thoại" maxlength="10">
                                    <small id="ersodienthoai" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá(Ty)</label>
                                    <input type="number" name="giabd" class="form-control" id="gia" placeholder="Gía">
                                    <small id="ergia" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả</label>
                                    <textarea class="form-control" id="mota"  name="motabd" rows="4" cols="50" placeholder="Giới thiệu"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiện tích</label>
                                    
                                    <div   class="form-group">
                                        @foreach($tienich as $value)
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"  value="{{$value->idtienich}}" onclick="ftienich(this.value)" name="tienich[]">
                                            <label class="form-check-label"> {{$value->tentienich}}</label>
                                          </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                                                           
                                <button type="button" name="add_baidang" id="savebaidang" onclick="KT_nhap()" class="btn btn-info">Đăng bài</button>
                            </form>
                            </div>
                        </div>
                    </section>

            </div>
          </div>  
            
         <!-- khoi tin tuc -->
         
      
        </div>
      </div>
           <script>
       $(document).ready(function() {
            $.ajax({
                url: '{{URL::to('quan')}}', 
                type: 'GET',
                dataType: 'json',
                success: function(dataReturn) {
                   
                    var tam = '';
                    $.each(dataReturn, function(k, v) {
                        tam += `<option value="${v.Title}">${v.Title}</option>`;
                    });
                    $('#quan').append(tam);
                }
                

            });
        });
        function KT_nhap()
        {
            var flag=0;
            var tieude1=$('#tieude').val();
            var hinhanh1=$('#hinhanh').val();
            var loaibatdongsan1=$('#loaibatdongsan').val();
            var dientich1=$('#dientich').val();
            var sodienthoai1=$('#sodienthoai').val();
            var gia1=$('#gia').val();
            if(tieude1=='')
            {
                flag=1;
                $('#ertieude').html('Không được bỏ trống tiêu đề')
            }else
            {
                $('#ertieude').html('')
            }


            if(hinhanh1=='')
            {
                flag=1;
                $('#erhinhanh').html('Vui lòng thêm file hình');
            }else
            {
                $('#erhinhanh').html('')
            }
            if(loaibatdongsan1=='')
            {
                flag=1;
                $('#erloaibatdongsan').html('Vui lòng chọn loại bất động sản');
            }else
            {
                $('#erloaibatdongsan').html('')
            }

            if(dientich1<=0 || dientich1=='')
            {
                flag=1;
                $('#erdientich').html('Diện tích phải lớn hơn 0 và không được bỏ trống');
            }else
            {
                $('#erdientich').html('')
            }
            //var lsdt=Number(sodienthoai1.length)
            if(sodienthoai1.length<10)
            {
                flag=1;
                $('#ersodienthoai').html('Số điện thoại gồm 10 số');
            }
            if(gia1<=0 || gia1=='')
            {
                flag=1;
                $('#ergia').html('Giá phải lớn hơn 0 và không được bỏ trống');
            }
            else
            {
                $('#ergia').html('')
            }

            //chot kết qua tìm kiếm
            if(flag==1)
            {
                alert('Thêm thất bại');
            }
            else
            {
                var r = confirm("Bạn muốn thêm bài đăng ");
                if (r == true) {
                    document.getElementById("myform").submit();
                } else {
                    
                }
                
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
        function F1(tenquan) {
            var ten=String(tenquan);
            var ten2="";
            console.log(ten);
            var idquan=-1;
            $.ajax({
                url: '{{URL::to('quan')}}',
                type: 'GET',
                dataType: 'json',
                success: function(dataReturn) {
                    console.log(dataReturn);
                    $.each(dataReturn, function(k, v) {
                            ten2=String(v.Title);
                            if(ten2==ten)
                            {
                                idquan=v.ID;
                            } 
                    });

                    $.ajax({
                         url: '{{URL::to('phuong')}}',
                        type: 'GET',
                         data: {
                        id: idquan
                        },
                        dataType: 'json',
                        success: function(dataReturn2) {
                            console.log(dataReturn2)
                            var tam = '';
                            $.each(dataReturn2, function(k, v) {
                                tam += `<option>${v.Title}</option>`;
                             });
                            $('#phuong').html(tam);
                   
                         }
                 });
            }

            });

           
        }
        function floaibds(loai)
        { 
            output='';
            if(loai==1)
            {

            }
            else
            { 
                 output+=`<div class="form-group">
                            <label for="exampleInputEmail1">Số tầng</label>
                            <input type="number" name="sotang" class="form-control" placeholder="Số tầng">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Chiều ngang</label>
                            <input type="text" name="chieungang" class="form-control" placeholder="Chiều ngang">
                            </div>
                            <div class="form-group">
                            <label for="exampleInputPassword1">Mặt tiền or Hẻm</label>
                            <select onChange="fmattien(this.value)" class="btn btn-info" name="mattien" >
                                <option value="1">Mặt tiền</option>
                                <option value="0">Nhà hẻm</option>
                            
                            </select>
                    </div>`;
            }
            $('#chucnangtheoloai').html(output);
        }
        function fmattien(x)
        {
            output='';
            if(x==0)
            {
                output=`<div class="form-group">
                            <label for="exampleInputPassword1">Ôtô đi được không</label>
                            <select class="btn btn-info" name="oto" >
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            
                            </select>
                    </div>`;
            }
            $('#chucnangmattien').html(output);

        }
        function fhinhanh(x)
        {   
            temp = x.split('\\');
            x = temp[temp.length-1];
            output=`<input type="hidden"  name="dshinh[]" value="${x}">
            <img name="" width="200px" height="200px" src="{{ asset('frontend/images/${x}')}}" alt="">`;
            $('#hinhanh').append(output);
        }
        function fileValidation(){
    var fileInput = document.getElementById('hinhanh');
    var filePath = fileInput.value;//lấy giá trị input theo id
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;//các tập tin cho phép
    //Kiểm tra định dạng
    if(!allowedExtensions.exec(filePath)){
        alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
        }else{
        //Image preview
            if (fileInput.files && fileInput.files[0])
             {
                var reader = new FileReader();
                reader.onload = function(e) 
                {
                document.getElementById('imagePreview').innerHTML = '<img style="width:100px;height:70px;" src="'+e.target.result+'"/>';
                };
            reader.readAsDataURL(fileInput.files[0]);
            }
    }
}

        function initMap() {
    var  geocode={lat:10.739714,lng: 106.6781644};
  mapbds = new google.maps.Map(document.getElementById("map"), {
    center: geocode,
    zoom: 13,
    mapTypeId: "roadmap"
  }); 
    var marker= new google.maps.Marker({
        position:geocode,
        map:mapbds
    });
    marker.addListener("click", () => {
       a=marker.getPosition();
       console.log(a.lat());
       console.log(a.lng());

    });
  var auto= new google.maps.places.Autocomplete(document.getElementById("autoseach"));
  auto.addListener('place_changed', function(){
      place=auto.getPlace();
        mapbds.fitBounds(place.geometry.viewport);
        marker.setPosition(place.geometry.location);
        var duong=place.name;
        if(!isNaN(duong.slice(0,1)))
        {
            vitri=duong.indexOf(' ');
            a=duong.slice(vitri+1);
            duong=a;
            if(a.indexOf('Đường')>=0)
            {
                b=a.replace('Đường ','');
                duong=b;
            }

            //console.log(a);
        }
        else{
            if(duong.indexOf('Đường')>=0)
            {
                b=duong.replace('Đường ','');
                duong=b;
            }
        }
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        $('#diachibaidang').val(duong);
        $('#latbdd').val(lat);
        $('#lngbdd').val(lng);
        $('#diachiallbd').val($('#autoseach').val());
  });
}

        </script>
@endsection