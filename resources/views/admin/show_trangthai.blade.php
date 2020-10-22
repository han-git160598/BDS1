@extends('admin_layout')
@section('admin_content')
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh Sách Bai dang
      </div>
      <div class="table-responsive">
        
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
              <th><a href="{{URL::to('sapxep-bds')}}">Tình trạng</a></th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <form  action="{{URL::to('seach-bd1')}}" method="get">

              <div class="active-cyan-4 mb-4">
                <input class="form-control" type="text" name="timbaidang" id="timbd2" placeholder="Search" aria-label="Search">
              </div>
             </form>
              @foreach($allbd as $k=>$item)
              
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                  </label>
                </th> 
                <?php $h=$item->hinh[0]->urlhinh; ?>
                <th><a href="{{URL::to('/detail-bd/'.$item->idbd)}}"><img width="70x" height="70px" src="aaa/uploads/{{$h}}" alt="Image" ></a> </th>
                <th>{{ $item->idbd }}</th>
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
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs">                
            <ul id="phantrang" class="pagination pagination-sm m-t-none m-b-none">
              <li><a onclick="phantrang(1)">1</a></li>
              <li><a onclick="phantrang(2)">2</a></li>
              <li><a onclick="phantrang(3)">3</a></li>
              <li><a onclick="phantrang(4)">4</a></li>
              <li><a onclick="nexttrang()><i class="fa fa-chevron-right"></i>>></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script>
    function phantrang(t)
    {
      var output='';
     $.ajax({
       type: "GET",
       url: "{{URL::to('phantrang-bd')}}",
       data: {
         trang: t//t: chi trinh trang so may muốn show
       },
        dataType: "json",
       success: function (data) { 
        $('tbody').html('');
           data.forEach(function (item) {
            output+=`
            <tr>
             <th style="width:20px;">
               <label class="i-checks m-b-none">
               </label>
             </th>
             <th><a href="{{URL::to('/detail-bd/${item.idbd}')}}"><img width="70x" height="70px" src="aaa/uploads/${item.hinh}" alt="Image" ></a> </th>
             <th>${item.idbd}</th>
             <th>${item.tenbd}</th>
             <th>${item.diachibd} - ${item.quan}</th>
             <th>${item.giabd} Tỷ</th>
             <td><span class="edit-status">`;
             if(item.trangthaibd==1){
                  output+= `<a href="{{URL::to('/status-1-bd/${item.idbd}')}}" > <img height="50" width="50"  src="{{asset('backend/images/status3.png')}}"> </a>`;
             }
             else{
                  output+= ` <a href="{{URL::to('/status-0-bd/${item.idbd}')}}"> <img height="50" width="50"  src="{{asset('backend/images/status-x.png')}}"> </a>`;
             }
             output+= ` </span></td>
             <th style="width:30px;"></th>
           </tr>
            `;
          });
         $('tbody').append(output);

         }
     });
   }
 $(document).ready(function () {
  
   $('#timbd2').keyup(function(event){
       var key = $('#timbd2').val();
       var output = '';
     $.ajax({
       type: "GET",
       url: "{{URL::to('seach-bd')}}",
       data: {
         key: key
       },
        dataType: "json",
       success: function (data) {
           console.log(data);       
           $('tbody').html('');
           data.forEach(function (item) {
            output+=`
            <tr>
             <th style="width:20px;">
               <label class="i-checks m-b-none">
               </label>
             </th>
             <th><a href="{{URL::to('/detail-bd/${item.idbd}')}}"><img width="70x" height="70px" src="aaa/uploads/${item.hinh}" alt="Image" ></a> </th>
             <th>${item.idbd}</th>
             <th>${item.tenbd}</th>
             <th>${item.diachibd} - ${item.quan}</th>
             <th>${item.giabd} Tỷ</th>
             <td><span class="edit-status">`;

             if(item.trangthaibd==1){
                  output+= `<a href="{{URL::to('/status-1-bd/${item.idbd}')}}" > <img height="50" width="50"  src="{{asset('backend/images/status3.png')}}"> </a>`;
             }
             else{
                  output+= ` <a href="{{URL::to('/status-0-bd/${item.idbd}')}}"> <img height="50" width="50"  src="{{asset('backend/images/status-x.png')}}"> </a>`;
             }
             output+= ` </span></td>
             <th style="width:30px;"></th>
           </tr>
            `;
          });
       $('tbody').html(output);

       }
     });
     
   });
 });
</script>
@endsection