@extends('admin_layout')
@section('admin_content')
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh Sách Khách Hàng
      </div>
      <div class="table-responsive">
        
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                </label>
              </th>
              <th>Mã</th>
              <th>Tên</th>
              <th>Email</th>
              <th>SDT</th>
              <th>Ngày sinh</th>
              <th>Đánh giá</th>
              <th>Vai trò</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
            <form  action="{{URL::to('seach-usersell')}}" method="get">
              <div class="active-cyan-4 mb-4">
                <input class="form-control" type="text" name="timusersell" id="timusersell" placeholder="Search" aria-label="Search">
              </div>
             </form>
             <tbody>
            @foreach($allusersell as $k=>$v)
              <tr>
                <td style="width:20px;">
                  <label class="i-checks m-b-none">
                  </label>
                </td>
                <input type="text" hidden="" id="idsell" value="{{$v->idsell}}"> 
                <td>{{ $v->idsell }}</td>
                <td>{{ $v->tensell }}</td>
                <td>{{ $v->emailsell }}</td>
                <td>{{ $v->sdtsell }}</td>
                <td>{{ $v->ngaysinhsell }}</td>
                <td>{{ $v->danhgia }} sao</td>
                
                <td>
                @if($v->capdosell == 0)
                <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option selected="" value="0">Đối tác</option>
                  <option value="1">Quản trị</option>
                  <option value="3">Khóa</option>
                </select>
                @elseif($v->capdosell == 1)
                <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option value="0">Đối tác</option>
                  <option selected=""  value="1">Quản trị</option>
                  <option value="3">Khóa</option>
                </select>
                @else
                <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option value="0">Đối tác</option>
                  <option value="1">Quản trị</option>
                  <option  selected=""  value="3">Khóa</option>
                </select>
                @endif
                </td>
                <td><a href="{{URL::to('/chi-tiet-usersell/'.$v->idsell)}}">Xem</a></td>
                <td style="width:30px;"></td>
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
              <li><a onclick="nexttrang()"><i class="fa fa-chevron-right" ></i>>></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script>  
   
    function quyen1(x)
            {  
              var capdo = $('#'+x+'capdo').val();
              console.log(x);
              $.ajax({
              type: "GET",
              url: "{{URL::To('/quyen-usersell')}}",
              data: {idsell: x, capdo1:capdo},
             dataType: "json",
              success: function (data)                          
                  {
                    alert(data['mes']);
                  }
                  });

            }
    function phantrang(t)
    {
      var output='';
     $.ajax({
       type: "GET",
       url: "{{URL::to('phantrang-usersell')}}",
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
                <th>${item.idsell}</th>
                <th>${item.tensell}</th>
                <th>${item.emailsell}</th>
                <th>${item.sdtsell}</th>
                <th>${item.ngaysinhsell}</th>
                <th>`;
                if(item.capdosell == 0){
               output+=`  <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option selected="" value="0">Đối tác</option>
                  <option value="1">Quản trị</option>
                  <option value="3">Khóa</option>
                </select>`;
              }else if(item.capdosell ==  1 ){
                output+=` <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option value="0">Đối tác</option>
                  <option selected=""  value="1">Quản trị</option>
                  <option value="3">Khóa</option>
                </select>`;
                }
                else{
                output+=` <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option value="0">Đối tác</option>
                  <option value="1">Quản trị</option>
                  <option selected=""   value="3">Khóa</option>
                </select>`;
                }
                output+=` </th>
                <th style="width:30px;"></th>
              </tr>
            `;
          });
         $('tbody').append(output);

         }
     });
   }
 $(document).ready(function () {
  
   $('#timusersell').keyup(function(event){
       var key = $('#timusersell').val();
       var output = '';
     $.ajax({
       type: "GET",
       url: "{{URL::to('seach-usersell')}}",
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
                <th>${item.idsell}</th>
                <th>${item.tensell}</th>
                <th>${item.emailsell}</th>
                <th>${item.sdtsell}</th>
                <th>${item.ngaysinhsell}</th>
                <th>`;
                if(item.capdosell == 0){
               output+=`  <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option selected="" value="0">Đối tác</option>
                  <option value="1">Quản trị</option>
                  <option value="3">Khóa</option>
                </select>`;
              }else if(item.capdosell ==  1 ){
                output+=` <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option value="0">Đối tác</option>
                  <option selected=""  value="1">Quản trị</option>
                  <option value="3">Khóa</option>
                </select>`;
                }
                else{
                output+=` <select id="{{$v->idsell}}capdo" onChange="quyen1({{$v->idsell}})">
                  <option value="0">Đối tác</option>
                  <option value="1">Quản trị</option>
                  <option selected=""   value="3">Khóa</option>
                </select>`;
                }
                output+=` </th>
                <th style="width:30px;"></th>
              </tr>
            `;
          });
       $('tbody').append(output);

       }
     });
     
   });
 });
</script>
@endsection
