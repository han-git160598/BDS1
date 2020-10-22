@extends('layout_FE')
@section('content') 
<style>
  #map {
      height: 500px;
      width: 100%;
  }
</style>
      <div class="row mb-5">
        <div class="col-12">
          <div class="site-section-title">
            <h2>Bài đăng mới</h2>
          </div> 
        </div>
      </div>
      <div >
        <label for="exampleInputEmail1">Địa chỉ cần quét</label>
        <input id="autoseach" type="text" style="width:300px" placeholder="Địa chỉ cần quét" >
        <label for="exampleInputEmail1">Bán kính quét</label>
        <input id="bk" type="number" style="width:50px;" placeholder="Bán kính" value="">KM
        <button onclick="fquetbankinh()" class="btn btn-warning">Quét</button>
      <div id="map"></div>
        <form class="row mb-5">
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select id="danhmuc" name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Danh Mục</option>
                @foreach($iddanhmuc as $v)
                <option value="{{$v->iddanhmuc}}">{{$v->tendanhmuc}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="loaibds" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Loai</option>
                <option value="0">Thuê</option>
                <option value="1">Bán</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="quann" onclick="F1(this.value)"  id="offer-types" class="form-control d-block rounded-0">
                <option value="-1">Quận</option>
              </select>
            </div>
          </div>
          
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
           <button type="button" onclick="timkiemhome()" class="btn btn-primary btn-block form-control-same-height rounded-0" >Search</button> 
          </div>
          
        </form>
        <div class="row mb-5" id="createseachnext">
        </div>
      <div class="row mb-5" id="resultseach">
         @foreach($all_baidang as $value)
        <div class="col-md-6 col-lg-4 mb-4">
          <a href="{{URL::to('/chi-tiet-bds/'.$value->idbd)}}" class="prop-entry d-block">
            @foreach($hinh as $v)
            @if($value->idbd == $v->idbd)
            <figure>
              <img  src="aaa/uploads/{{$v->urlhinh}}" height="320" width="450" alt="Image" >
            </figure>
              @break
              @endif
             @endforeach

            <div class="prop-text">
              <div class="inner">
                <span class="price rounded">{{$value->giabd}} @if($value->loaibd==1) tỷ @else triệu @endif</span>
                <h3 class="title">{{$value->tenbd}}</h3>
                <p class="location">Đường {{$value->diachibd}} </p>
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
                    <strong>{{$value->dientich}}m<sup>2</sup></strong>
                  </div>

                  <div class="col">
                    <span>Beds:</span>
                    <strong>{{$value->phongngu}}</strong>
                  </div>
                  <div class="col">
                    <span>Baths:</span>
                    <strong>{{$value->nhatam}}</strong>
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
      <ul id="pt" class="pagination justify-content-center">
   
    <li class="page-item"><a class="page-link" onclick="phantranghome(1)">1</a></li>
    <li class="page-item"><a class="page-link" onclick="phantranghome(2)">2</a></li>
    <li class="page-item"><a class="page-link" onclick="phantranghome(3)">3</a></li>
    <li class="page-item"><a class="page-link" onclick="phantranghome(4)">4</a></li>
    <li class="page-item"><a class="page-link" onclick="phantranghome(5)">5</a></li>
  
  </ul>
      <div class="row mb-5" id="resultduong">
      </div>
      
      
      <div class="row mb-5">
        <div class="col-12">
          <div class="site-section-title">
            <h2>Sản phẩm đã xem</h2>
          </div> 
        </div>
      </div>
      <div id="luuvet" class="row mb-5"></div>
   
      <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
      <script
  src="https://maps.googleapis.com/maps/api/js?v=3&libraries=geometry,places&language=vi-VN&key=AIzaSyDLlnLyGsl0e5MZzX4SKua7WQx_9hCeCZY&callback=initMap"
defer></script>
      <script>
        
        var dataseach={};// chứa data hiện tại để cho việc tìm kiếm kế tiếp;
      var dataall={};
       var dataphantrang={};
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
                    $('#quann').append(tam);
                }

            });
            var arr=[];
            //sessionStorage.clear();
            $.each(sessionStorage,function(k,v)
            {
                arr.push(v);
            });
            var arrvet=[...new Set(arr)];
          for(i=0;i<arrvet.length;i++)
          {
            var id;
            id=arrvet[i];
            $.ajax({
              type:"GET",
              url:'{{URL::to('luu-vet')}}',
              data:{idbdd:id},
              dataType:"json",
              success: function(response)
              {
                var output="";
             
                    output+=`
                      <div class="col-md-6 col-lg-4 mb-4">

                    <a href="{{URL::to('chi-tiet-bds/${response[0].idbd}')}}" class="prop-entry d-block">
            <figure>
              <img  src="aaa/uploads/${response[1]}" height="320" width="450" alt="Image" >
            </figure>

            <div class="prop-text">
              <div class="inner">
                <span class="price rounded">${response[0].giabd} `;if(response[0].loaibd==1) output+=`tỷ`; else output+=`triệu`;  output+=`VND</span>
                <h3 class="title">${response[0].tenbd}</h3> 
                <p class="location">${response[0].diachibd}</p>
                <span class="title">`;
                if(response[0].loaibd==0)
                  output+=`<span class="offer-type bg-danger">Thuê</span>`;
                else
                  output+=`<span class="offer-type bg-success">Bán</span>`;


                output+=  `</span>
              </div>
              <div class="prop-more-info"> 
                <div class="inner d-flex">
                  <div class="col">
                    <span>Diện tích:</span>
                    <strong>${response[0].dientich}m<sup>2</sup></strong>
                  </div>

                  <div class="col">
                    <span>Beds:</span>
                    <strong>${response[0].phongngu}</strong>
                  </div>
                  <div class="col">
                    <span>Baths:</span>
                    <strong>${response[0].nhatam}</strong>
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
                      `;
                $('#luuvet').append(output);
              }
            });
          }
            
        });

        function F1(tenquan) {
            var ten=String(tenquan);
            var ten2="";
            var idquan=-1;
            
            $.ajax({
                url:  '{{URL::to('quan')}}',
                type: 'GET',
                dataType: 'json',
                success: function(dataReturn) {
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
                          dataphuong=dataReturn2   ;
                        }
                         
                 });
            }
           
            });
           
            }
        function phantrangall(sotrang)
        {
          var count = Object.keys(dataall).length;
          output='';
          var dau=sotrang*9-9;
          var cuoi=dau+9;
          if(dau<=count)
          {
            for(let i=dau;i<count;i++)
            {
              if(i==cuoi)
              {
                break;
              }
               output+=`
                                <div class="col-md-6 col-lg-4 mb-4">
                              <a href="{{URL::to('chi-tiet-bds/${dataall[i].idbd}')}}" class="prop-entry d-block">
                      <figure>
                        <img  src="aaa/uploads/${dataall[i].urlhinh}" height="320" width="450" alt="Image" >
                      </figure>

                      <div class="prop-text">
                        <div class="inner">
                          <span class="price rounded">${dataall[i].giabd} `;if(dataall[i].loaibd==1) output+=`tỷ`; else output+=`triệu`;  output+=`VND</span>
                          <h3 class="title">${dataall[i].tenbd}</h3>
                          <p class="location">${dataall[i].diachibd}</p>
                          <span class="title">`;
                            if(dataall[i].loaibd==0)
                            {
                              output+=`<span class="offer-type bg-danger">Thuê</span>`;
                            }
                            else
                            {
                           output+=`<span class="offer-type bg-success">Bán</span>`;
                            }
                           

                    output+=` </span>
                        </div>
                        <div class="prop-more-info">
                          <div class="inner d-flex">
                            <div class="col">
                              <span>Diện tích:</span>
                              <strong>${dataall[i].dientich}m<sup>2</sup></strong>
                            </div>

                            <div class="col">
                              <span>Beds:</span>
                              <strong>${dataall[i].phongngu}</strong>
                            </div>
                            <div class="col">
                              <span>Baths:</span>
                              <strong>${dataall[i].nhatam}</strong>
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
                                `;
              
            }
          }
          $('#resultseach').html(output);
        }
        function phantrang(data)
        {
          output='';
            for(i=0;i<data.length;i++)
            {
              if(i==9)
              {
                break;
              }
              output+=`
                              <div class="col-md-6 col-lg-4 mb-4"> 
                            <a href="{{URL::to('chi-tiet-bds/${data[i].idbd}')}}" class="prop-entry d-block">
                    <figure>
                      <img  src="aaa/uploads/${data[i].urlhinh}" height="320" width="450" alt="Image" >
                    </figure>

                    <div class="prop-text">
                      <div class="inner">
                        <span class="price rounded">${data[i].giabd} `;if(data[i].loaibd==1) output+=`tỷ`; else output+=`triệu`;  output+=`VND</span>
                        <h3 class="title">${data[i].tenbd}</h3>
                        <p class="location">${data[i].diachibd}</p>
                        <span class="title">`;
                          if(data[i].loaibd==0)
                          {
                            output+=`<span class="offer-type bg-danger">Thuê</span>`;
                          }
                          else
                          {
                         output+=`<span class="offer-type bg-success">Bán</span>`;
                          }
                         

                  output+=` </span>
                      </div>
                      <div class="prop-more-info">
                        <div class="inner d-flex">
                          <div class="col">
                            <span>Diện tích:</span>
                            <strong>${data[i].dientich}m<sup>2</sup></strong>
                          </div>

                          <div class="col">
                            <span>Beds:</span>
                            <strong>${data[i].phongngu}</strong>
                          </div>
                          <div class="col">
                            <span>Baths:</span>
                            <strong>${data[i].nhatam}</strong>
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
                              `;
            }
             $('#resultseach').html(output);
        }
         function phantrang2()//dùng cho hàm seachnext
        {
           var count = Object.keys(dataphantrang).length;
          output='';
             for(let i=0;i<count;i++)
            {
              if(i==9)
              {
                break;
              }
              
              output+=`
                              <div class="col-md-6 col-lg-4 mb-4">

                            <a href="{{URL::to('chi-tiet-bds/${dataphantrang[i].idbd}')}}" class="prop-entry d-block">
                    <figure>
                      <img  src="aaa/uploads/${dataphantrang[i].urlhinh}" height="320" width="450" alt="Image" >
                    </figure>

                    <div class="prop-text">
                      <div class="inner">
                        <span class="price rounded">${dataphantrang[i].giabd} `;if(dataphantrang[i].loaibd==1) output+=`tỷ`; else output+=`triệu`;  output+=`</span>
                        <h3 class="title">${dataphantrang[i].tenbd}</h3>
                        <p class="location">${dataphantrang[i].diachibd}</p>
                        <span class="title">`;
                          if(dataphantrang[i].loaibd==0)
                          {
                            output+=`<span class="offer-type bg-danger">Thuê</span>`;
                          }
                          else
                          {
                         output+=`<span class="offer-type bg-success">Bán</span>`;
                          }
                         

                  output+=` </span>
                      </div>
                      <div class="prop-more-info">
                        <div class="inner d-flex">
                          <div class="col">
                            <span>Diện tích:</span>
                            <strong>${dataphantrang[i].dientich}m<sup>2</sup></strong>
                          </div>

                          <div class="col">
                            <span>Beds:</span>
                            <strong>${dataphantrang[i].phongngu}</strong>
                          </div>
                          <div class="col">
                            <span>Baths:</span>
                            <strong>${dataphantrang[i].nhatam}</strong>
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
                              `;
            }
             $('#resultseach').html(output);
        }
        function phantranghome(t)
        {
          $.ajax({
                url: '{{URL::to('phan-trang-home')}}',
                type: 'GET',
                data: {trang:t},
                dataType: 'json',
                success: function(dataReturn) {
                 
                  output='';
                  $.each(dataReturn,function(k,v)
                  {
                    output+=`
                              <div class="col-md-6 col-lg-4 mb-4">   
                            <a href="{{URL::to('chi-tiet-bds/${v.idbd}')}}" class="prop-entry d-block">
                    <figure>
                      <img  src="aaa/uploads/${v.urlhinh}" height="320" width="450" alt="Image" >
                    </figure>

                    <div class="prop-text">
                      <div class="inner">
                        <span class="price rounded">${v.giabd} `;if(v.loaibd==1) output+=`tỷ`; else output+=`triệu`;  output+=`VND</span>
                        <h3 class="title">${v.tenbd}</h3>
                        <p class="location">${v.diachibd}</p>
                        <span class="title">`;
                          if(v.loaibd==0)
                          {
                            output+=`<span class="offer-type bg-danger">Thuê</span>`;
                          }
                          else
                          {
                         output+=`<span class="offer-type bg-success">Bán</span>`;
                          }
                         

                  output+=` </span>
                      </div>
                      <div class="prop-more-info">
                        <div class="inner d-flex">
                          <div class="col">
                            <span>Diện tích:</span>
                            <strong>${v.dientich}m<sup>2</sup></strong>
                          </div>

                          <div class="col">
                            <span>Beds:</span>
                            <strong>${v.phongngu}</strong>
                          </div>
                          <div class="col">
                            <span>Baths:</span>
                            <strong>${v.nhatam}</strong>
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
                              `;
                  });
                  $('#resultseach').html(output);
                }
          });
        }
        function timkiemhome()
        {
          var danhmuc=$('#danhmuc').val();
          var loaibds=$('#loaibds').val();
          var quanbds=$('#quann').val();
          $.ajax({
                url: '{{URL::to('timkiemhome')}}',
                type: 'GET',
                data: {dm:danhmuc,loai:loaibds,quan:quanbds},
                dataType: 'json',
                success: function(dataReturn) {
                  console.log(dataReturn);
                  dataseach=dataReturn;
                  dataphantrang=dataReturn;//dung cho ham phantrang2
                  dataall=dataReturn;
                  var output='';
                  var outputpt=`<li class="page-item"><a class="page-link" onclick="phantrangall(1)">1</a></li>
    <li class="page-item"><a class="page-link" onclick="phantrangall(2)">2</a></li>
    <li class="page-item"><a class="page-link" onclick="phantrangall(3)">3</a></li>
    <li class="page-item"><a class="page-link" onclick="phantrangall(4)">4</a></li>
    <li class="page-item"><a class="page-link" onclick="phantrangall(5)">5</a></li>`;


                  $('#pt').html(outputpt);
                
                  var outputseach=`
                  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="phuong" onChange="seachnext()" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Phường</option>`;
                $.each(dataphuong, function(k, v) {
                  outputseach+=`<option>${v.Title}</option>`
                    });
                    outputseach+=` 
              </select>
            </div>
          </div>
                  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="pn" onChange="seachnext()" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Phòng ngủ</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5+">5+</option>
              </select>
            </div>
          </div>
         
          `;
          if(danhmuc==1)
          outputseach+=`<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="dientich" onChange="seachnext()" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Diện tích</option>
                <option value="1">Dưới 100 m2</option>
                <option value="2">100 -> 200 m2</option>
                <option value="3">200 -> 300 m2</option>
                <option value="4">300 -> 400 m2</option>
                <option value="5">Trên 500 m2</option>
              </select>
            </div>
          </div> `;
          else
          outputseach+=`<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="sotang" id="offer-types" onChange="seachnext()" class="form-control d-block rounded-0">
                <option value="">Số Tầng</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5+">5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="dientich" onChange="seachnext()" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Diện tích</option>
                <option value="1">Dưới 100 m2</option>
                <option value="2">100 -> 200 m2</option>
                <option value="3">200 -> 300 m2</option>
                <option value="4">300 -> 400 m2</option>
                <option value="5">Trên 500 m2</option>
              </select>
            </div>
          </div>`;
          if(loaibds==1)
          outputseach+=`<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="gia" onChange="seachnext()" id="offer-types" class="form-control d-block rounded-0">
                <option value="">Giá</option>
                <option value="1">Dưới 1 tỷ</option>
                <option value="2">1 -> 3 tỷ</option>
                <option value="3">3 -> 5 tỷ</option>
                <option value="4">5 -> 10 tỷ</option>
                <option value="5">Trên 10 tỷ</option>
              </select>
            </div>
          </div> `;
          else
          {
          outputseach+=`<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="gia" id="offer-types" onChange="seachnext()" class="form-control d-block rounded-0">
                <option value="">Giá</option>
                <option value="1">Dưới 5 triệu</option>
                <option value="2">5 -> 10 triệu</option>
                <option value="3">10 -> 15 triệu</option>
                <option value="4">15 -> 30 triệu</option>
                <option value="5">Trên 30 triệu</option>
              </select>
            </div>
          </div>
          `;
        }
        outputseach+=`<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="mattien" id="offer-types" onChange="seachnext()" class="form-control d-block rounded-0">
                <option value="">Mặt tiền or Hẻm</option>
                <option value="0">Nhà hẻm</option>
                <option value="1">Nhà mặt tiền</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="offer-types" id="oto" id="offer-types" onChange="seachnext()" class="form-control d-block rounded-0">
                <option value="">Bạn có Ôtô không</option>
                <option value="0">Không</option>
                <option value="1">Có</option>
              </select>
            </div>
          </div>
          `;
          $('#createseachnext').html(outputseach);
                  
         phantrang(dataReturn);
                var arrduong=[];
           
                $.each(dataseach,function(k,v)
                {
                  arrduong.push(v.diachibd);
                });
                var countduong=[...new Set(arrduong)];
                  outputduong='';
                 
                      for (i = 0; i < countduong.length; i++)
                      {
                          soluong=0;
                          tenduong=String(countduong[i]);
                            for (j = 0; j < arrduong.length; j++)
                          {
                            tenduong2=String(arrduong[j]);
                              if (countduong[i] == arrduong[j])
                              {
                                soluong++;
                              }
                          }
                  
                        outputduong+=` <button value="${tenduong}" onClick="seachduong(this.value)">${tenduong}: ${soluong} BDS</button>`;
                      }
                      $('#resultduong').html(outputduong);

                      
                }
          });
          

        }
      
        function seachnext()
        {
          let xpn=$('#pn').val();
          let xphuong=$('#phuong').val();
          let xgia=$('#gia').val();
          let xsotang=$('#sotang').val();
          let xdientich=$('#dientich').val();
          let xmattien=$('#mattien').val();
          let xoto=$('#oto').val();
          let tam = dataseach;
          if(xphuong)//so sanh theo phuong
            {
              let tam2 = {};
              let j = 0;
              let stringphuong=String(xphuong);
              let y=stringphuong.charAt(0).toLowerCase() + stringphuong.slice(1);
              let x='';//luu phường tạm để so sánh
              $.each(tam, function (k, v) {
                  x=String(v.diachiall);
                  if(x.indexOf(y)>=0)
                  {
                    tam2[j]=v;
                    j++;
                  }
              });
              tam=tam2;
            }
          if(xpn)// so sanh theo so phong ngu
            {
              let tam2 = {};
              let j = 0;
              $.each(tam, function (k, v) {
                  if(v.phongngu>=xpn)
                  {
                    tam2[j]=v;
                    j++;
                  }
                 
              });
              tam=tam2;
            }
          if(xsotang)// so sanh theo gia tien
            {
              let tam2 = {};
              let j = 0;
              $.each(tam, function (k, v) {
                  if(xsotang==1)
                  {
                    if(v.sotang==1)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xsotang==2)
                  {
                    if(v.sotang==2)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xsotang==3)
                  {
                    if(v.sotang==3)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                 
                  if(xsotang==4)
                  {
                    if(v.sotang==4)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xsotang==5)
                  {
                    if(v.sotang>=5)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                 
              });
              tam=tam2;
            }
          if(xgia)// so sanh theo gia tien
            {
              let tam2 = {};
              let j = 0;
              $.each(tam, function (k, v) {
                  if(xgia==1)
                  {
                    if(v.giabd>0&&v.giabd<1.0)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xgia==2)
                  {
                    if(v.giabd>=1.0&&v.giabd<3.0)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xgia==3)
                  {
                    if(v.giabd>=3.0&&v.giabd<5.0)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  x=Number(v.giabd);
                  if(xgia==4)
                  {
                    if(v.giabd>=5.0&&v.giabd<10.0)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xgia==5)
                  {
                    if(v.giabd>=10.0)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                 
              });
              tam=tam2;
            }
          if(xdientich)// so sanh theo gia tien
            {
              let tam2 = {};
              let j = 0;
              $.each(tam, function (k, v) {
                  if(xdientich==1)
                  {
                    if(v.dientich>0 &&v.dientich<100)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xdientich==2)
                  {
                    if(v.dientich>=100&&v.dientich<200)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xdientich==3)
                  {
                    if(v.dientich>=200&&v.dientich<300)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                
                  if(xdientich==4)
                  {
                    if(v.dientich>=300&&v.dientich<400)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                  if(xdientich==5)
                  {
                    if(v.dientich>=500)
                      {
                        tam2[j]=v;
                        j++;
                      }
                  }
                 
              });
              tam=tam2;
            }
          if(xmattien)// so sanh theo gia tien
            {
              let tam2 = {};
              let j = 0;
              $.each(tam, function (k, v) {
                  if(xmattien==1)
                  {
                    if(v.mattien==1)
                      {
                        tam2[j]=v;
                        j++;
                      }
                    
                  }
                  if(xmattien==0)
                  {
                    
      
                      if(v.mattien==0)
                      {
                        tam2[j]=v;
                        j++;

                      }
        
                    
                  }
                  
                 
              });
              tam=tam2;
            }
            if(xmattien&&xoto)// so sanh theo gia tien
            {
              let tam2 = {};
              let j = 0;
              $.each(tam, function (k, v) {
                  if(xmattien==1)
                  {
                    if(v.mattien==1)
                      {
                        tam2[j]=v;
                        j++;
                      }
                    
                  }
                  if(xmattien==0)
                  {
                    
                      if(xoto==1)
                      {

                        if(v.oto==1)
                        {
                          tam2[j]=v;
                          j++;
                        }

                      }
                      else
                      {
                        if(v.oto==0)
                        {
                          tam2[j]=v;
                          j++;

                        }
                    }
        
                    
                  }
                  
                 
              });
              tam=tam2;
            }
            dataphantrang=tam;
            dataall=tam;
            phantrang2();
           
        }
        function seachduong(duong)
        {
          let tam={};
          let i=0;
          x=String(duong);
          outputduong2='';
          $.each(dataseach, function(k, v) {
             
                a2=String(v.diachibd);
             
                 
                if (x == a2)
                {
                tam[i]=v;
                 i++;
                  
                }
            });
            dataphantrang=tam;
            dataall=tam;
            phantrang2();
        }

        var cityCircle;//ban kinh
       var xlat;
       var xlng;
        var mapbds;
        var geocode;//toa do luu
        <?php                 
            $dataquet = json_encode($dataquettoado)   ;     
            echo "var dataquet = ". $dataquet . ";\n";
          ?>
        function attachSecretMessage(marker, id,info) {
            const infowindow = new google.maps.InfoWindow({
              content: info
            });
            marker.addListener("click", () => {
              infowindow.open(marker.get("map"), marker);
            });
            marker.addListener("dblclick", () => {
              window.open("http://127.0.0.1:8000/chi-tiet-bds/"+id, "_blank");
            });
          }  
        function them_marker(lat, lng, idbd,info)
        {
            const marker= new google.maps.Marker({
                position:{lat:lat,lng:lng},
                map:mapbds
            });
            attachSecretMessage(marker, idbd,info);
        }
        function RemoveCircle(){
    if(cityCircle){
        cityCircle.setMap(null);
    }
}
        function tao_bankinh(lat, lng, bk){
          if(lat && lng){
              cityCircle = new google.maps.Circle({
                  strokeColor: '#888', // Màu viên
                  strokeOpacity: 0.5, // Độ mờ viền
                  strokeWeight: 1, // Độ mảnh của đường tròn
                  fillColor: '#03A9F4', // Màu nền của đường tròn
                  fillOpacity: 0.1, // Độ trong suốt của nền
                  map: mapbds, // Hiển thị trên map nào
                  center: {lat: lat, lng: lng}, // tạo độ trung tâm
                  radius: bk // bán kính
              });

          }
        }
        function tim_chieudai(lat1,lng1,lat2,lng2){
            var R = 6371; 
            var dLat = (lat2 - lat1) * Math.PI / 180;  
            var dLon = (lng2 - lng1) * Math.PI / 180;
            var a = 
                0.5 - Math.cos(dLat)/2 + 
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * 
                (1 - Math.cos(dLon))/2;
            return R * 2 * Math.asin(Math.sqrt(a));
        }
        function fquetbankinh()
        {
          var outputpt=`<li class="page-item"><a class="page-link" onclick="phantrangall(1)">1</a></li>
                        <li class="page-item"><a class="page-link" onclick="phantrangall(2)">2</a></li>
                        <li class="page-item"><a class="page-link" onclick="phantrangall(3)">3</a></li>
                        <li class="page-item"><a class="page-link" onclick="phantrangall(4)">4</a></li>
                        <li class="page-item"><a class="page-link" onclick="phantrangall(5)">5</a></li>`;
                  $('#pt').html(outputpt);
          //console.log(dataquet);
            bankinh=$('#bk').val();
            RemoveCircle();
            tao_bankinh(xlat,xlng,bankinh*1000);
            let tam ={} ;
            let j=0;
             $.each(dataquet, function (k,v) { 
                 chieudai=tim_chieudai(xlat,xlng,v.lat,v.lng);
                //if(tim_chieudai(xlat,xlng,v.lat,v.lng)<=3)
                  if(chieudai<=bankinh)
                  {
                      
                      x=Number(v.lat);
                      y=Number(v.lng);
                      id=String(v.idbd);// dung de id vao click marker
                      info=`<div>
                      <p><b>${v.tenbd}</b></br>
                      Giá :   ${v.giabd} Tỷ 
                      <img  src="aaa/uploads/${v.urlhinh}" height="80" width="80" alt="Image" >    </div>`;
                      them_marker(x,y,id,info);
                      tam[j]=v;
                      j++;
                  }

               
               
            });
            dataphantrang=tam;
            dataall=tam;
            phantrang2();

        }


        function initMap() {
            geocode={lat:10.739714,lng: 106.6781644};
            mapbds = new google.maps.Map(document.getElementById("map"), {
            center: geocode,
            zoom: 13,
            mapTypeId: "roadmap"
            }); 
            marker= new google.maps.Marker({
                position:geocode,
                map:mapbds
            });
          var auto= new google.maps.places.Autocomplete(document.getElementById("autoseach"));
          auto.addListener('place_changed', function(){
                place=auto.getPlace();
                mapbds.fitBounds(place.geometry.viewport);
                marker.setPosition(place.geometry.location);
                xlat=place.geometry.location.lat();
                xlng=place.geometry.location.lng();
          });
  //console.log(chieudai);

      }
        </script>
@endsection

