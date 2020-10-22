@extends('layout_ql_bd')
@section('us_content') 
      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{URL::to('frontend/images/hero_bg_4.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
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
          <a href="{{URL::to('/add-bds/'.Session::get('idsell'))}}">Tổng bài đăng: <?php $a= count($all_baidang); echo $a; ?></a>
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
              Tìm kiếm
              <input type="text" id="tims"  class="input-sm form-control" placeholder="Search">
            </div>
          </div>
        </div>
        
        <div class="table-responsive">
          
         <center><h3 class="text-active"><span style="color: red"><?php
            $message=Session::get('message');
            if($message)
                {
                echo $message;
                Session::put('message',null);
                }
          ?></span></h3></center> 
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Tiêu đề</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Danh Mục</th>
                <th>Loại BDS</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
            @foreach($all_baidang as $k => $value)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$value->tenbd}}</td>
                <td>{{$value->giabd}} tỷ</td>
                <td>
                @foreach($hinh as $v)
                  @if($value->idbd == $v->idbd)
                <img src="aaa/uploads/{{$v->urlhinh}}" height="100" width="100">
                  @break
                  @endif  
                @endforeach
                </td>
                <td>{{$value->tendanhmuc}}</td>

                <td><span class="text-ellipsis">
              <?php
               if($value->loaibd==0) {?>
               <span>Thuê</span>
               <?php } else { ?>
               <span >Bán</span> 
                <?php } ?>
             
              </span></td>

                <td>
                  @if($value->trangthaibd ==0)
                  <p>Chờ xét duyệt</p>
                  @else
                  <p>Thành công</p>
                  @endif

                </td>

               
                
                <td>
                  <a href="{{URL::to('/edit-bds/'.$value->idbd)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa sản phẩm ?')" href="{{URL::to('/delete-bds/'.$value->idbd)}}" class="active styling-edit" ui-toggle-class="">
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
                
                {{ $all_baidang->links() }}
                
              </ul>
            </div>
          </div>
        </footer>
      </div>
</div>

<script>
  $(document).ready(function () {

  $("#tims").keyup(
    function()
    {
      var output = '';
      var search = $('#tims').val();
       $.ajax({
        type: 'GET',
        url: '{{URL::to('tim')}}', 
        data: {tim : search }, 
        dataType: "json",
        success: function (data) 
         {
              $('tbody').html('');
           data.forEach(function (item) { 
              output+=`<tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>${item.tenbd}</td>
                <td>${item.giabd} tỷ</td>
                <td>
                <img src="/aaa/uploads/${item.urlhinh}" height="100" width="100"> 
                </td>
                <td>${item.tendanhmuc}</td>
                <td><span class="text-ellipsis">`;
               if(item.loaibd==0) 
              
             output+=`<span>Thuê</span>`;
               else 
             output+=`<span >Bán</span> `;
             output+=`</span></td> <td>`;
                  if(item.trangthaibd ==0)
              output+=`<p>Đang gửi yêu cầu</p>`;  
                 else    
              output+=` <p>Đã xác nhận</p>`;
              output+=` </td>  <td>
                  <a href="{{URL::to('/edit-bds/${item.idbd}')}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa sản phẩm ?')" href="{{URL::to('/delete-bds/${item.idbd}')}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>

                </td>
              </tr>`;



              });
           $('tbody').append(output);
          }
        });

      
      
    }
    );
});
  
  

</script>












@endsection