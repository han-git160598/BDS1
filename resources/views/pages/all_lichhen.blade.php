@extends('layout_ql_bd')
@section('us_content') 
      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{URL::to('frontend/images/hero_bg_3.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
              <h1 class="mb-2">Quản lý bài đăng</h1>
              <div><a href="{{URL::to('/all-bds')}}">Danh sách bài đăng</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white"><a href="{{URL::to('/add-bds')}}">Thêm bài viêt</a></strong><span class="mx-2 text-white">&bullet;</span> <strong class="text-white"><a href="{{URL::to('/all-lichhen')}}">Quản lý Lịch hẹn</a></strong>
              </div>
            </div>
          </div>
        </div>
      </div>
 
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Tổng lịch hẹn: <?php $a= count($all_lichhen); echo $a; ?>
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <h3 class="text-active"><span class="panel-footer"><?php
            $message=Session::get('message');
            if($message)
                {
                echo $message;
                Session::put('message',null);
                }
          ?></span></h3>
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>ID lịch hẹn</th>
                <th>BDS hẹn</th>
                <th>Tên người hẹn </th>
                <th>Email liên hệ</th>
                <th>Số điện thoại</th>
                <th>Thời gian hẹn</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($all_lichhen as $value)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$value->idlichhen}}</td>
                <td><a href="{{URL::to('/chi-tiet-bds/'.$value->idbd)}}" target="blank" class="prop-entry d-block">
            @foreach($hinh as $v)
            @if($value->idbd == $v->idbd)
            <figure>
              <img  src="aaa/uploads/{{$v->urlhinh}}" height="100" width="250" alt="Image" >
            </figure>
              @break
              @endif
             @endforeach

            <div class="prop-text">
              <div class="inner">
                <span class="price rounded">{{$value->giabd}} Tỷ VND</span>
                <h3 class="title">{{$value->tenbd}}</h3>
                <p class="location">{{$value->diachibd}} </p>
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
          </a></td>
                <td>{{$value->tenkh}}</td>
                <td>{{$value->emailkh}}</td>
                <td>{{$value->phone}}</td>
                 <td>{{$value->thoigian}}</td> 

                <td><span class="text-ellipsis">
              @if($value->trangthai == 0)
              <select id="tt_lichhen<?php echo $value->idlichhen ?>" onChange="capnhatlh({{$value->idlichhen}})">
                <option selected="" value="0">Đang chờ</option>
                <option value="1">Done</option>
              </select>
              @else
              <select id="tt_lichhen<?php echo $value->idlichhen ?>" onChange="capnhatlh({{$value->idlichhen}})">
                <option value="0">Đang chờ</option>
                <option selected="" value="1">Done</option>
              </select>
              @endif
               
             
              </span></td>
      
                
                <td>
                  <a onclick="return confirm('Bạn có muốn xóa không ?')" href="{{URL::to('/delete-lichhen/'.$value->idlichhen)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>

                </td>
              </tr>
          @endforeach
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
             
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                
                {{ $all_lichhen->links() }}
                
              </ul>
            </div>
          </div>
        </footer>
      </div>
</div>
<script type="text/javascript">

function capnhatlh(x)
            { 
            
     
              $.ajax({
              type: "GET", 
              url: "{{URL::to('tt-lichhen')}}",
              data: {idlh: x},
             dataType: "json",
              success: function (data)                          
                  {
                    alert(data['mes']);
                  }
                  });

            }
          


</script>
















@endsection