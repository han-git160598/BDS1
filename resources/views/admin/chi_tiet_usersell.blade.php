@extends('admin_layout')
@section('admin_content')
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    {{ $usersell[0]->tensell }}
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email :{{$usersell[0]->emailsell}} </label>  
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quyền:
                                @if($usersell[0]->capdosell == 1)
                                Quản trị
                                @else
                                Đối tác
                                @endif  
                              </label>
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số bất động sản đã đăng:</label>
                            <label for="exampleInputEmail1"><?php echo count($baidang); ?></label>    
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số bình luận:</label>
                            <label for="exampleInputEmail1"><?php echo count($binhluan); ?></label>                               
                        </div>                               
                    
                    </div>
                </div>
            </section>

    </div>
  </div>
  <table class="table table-striped b-t b-light">
    <thead>
     
      <tr>
        <th style="width:20px;">
          <label class="i-checks m-b-none">
          </label>
        </th>
        <th>Hình ảnh</th>
        <th>Mã</th>
        <th>Tên</th>
        <th>Địa chỉ</th>
        <th>Giá</th>
        <th>Tình trạng
          <select id="tinhtrang" onchange="tinhtrang(this.value)">
              <option  value="2" >Tất cả</option>
              <option value="0">Chưa duyệt</option>
              <option value="1">Đã duyệt</option>
            </select>
        </th>
        <th style="width:30px;"></th>
      </tr>
    </thead>

    <tbody>

      
        @foreach($baidang as $k=>$item)
        <tr>
          <th style="width:20px;">
            <label class="i-checks m-b-none">
            </label>
          </th> 
          <?php $h=$item->hinh[0]->urlhinh; ?>
          <th><a target="_blank" href="{{URL::to('/chi-tiet-bds/'.$item->idbd)}}"><img width="70x" height="70px" src="aaa/uploads/{{$h}}" alt="Image" ></a></th>
          <th>{{ $item->tenbd }}</th>
          <th>{{ $item->diachibd }} - {{ $item->quan }}</th>
          <th>{{ $item->giabd }} Tỷ</th>
          <td><span class="edit-status">
            <?php
              if($item->trangthaibd==1){
              ?>
                <a href="{{URL::to('/status-1-bd/'.$item->idbd)}}" > <img height="50" width="50"  src="{{asset('backend/images/status3.png')}}"> </a>
              <?php
              }
              else{
              ?>
                <a href="{{URL::to('/status-0-bd/'.$item->idbd)}}"> <img height="50" width="50"  src="{{asset('backend/images/status-x.png')}}"> </a>
              <?php
              }   
            ?>
            </span></td>
          <th style="width:30px;"></th>
        </tr>
        @endforeach
     </tbody>
     
  </table>
@endsection
