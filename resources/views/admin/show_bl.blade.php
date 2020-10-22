@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh Sách Bình luận
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
              <th>Nội dung</th>
              <th>Bài đăng</th>
              <th>Người bình luận</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach($allbl as $k=>$v)
              <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                </label>
              </th>
              <th>{{ $v->idbinhluan }}</th>
              <th>{{ $v->noidung}}</th>
              <th>{{ $v->idbd }}</th>
              <th>{{ $v->emailsell }}</th>
              <th style="width:30px;">
                <button type="button" name="delete-ti" onclick="deletebl({{$v->idbinhluan }})" class="btn btn-info">Xóa</button>
              </th>
              </tr>
              @endforeach
           </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
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
    function deletebl(id)
    {
         var r = confirm("Bạn có chắc muốn xóa không !");
        if (r == true)
         {
            $.ajax({
                type: "GET",
                url: "{{URL::to('/delete-bl')}}",
                data: {idbl1 : id},
                dataType: "json",
                success: function (response) {
                        

                        var output='';
                        response.forEach(function(item)
                         {                   
                            output+=`<tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                </label>
              </th>
              <th>${item.idbinhluan}</th>
              <th>${item.noidung}</th>
              <th>${item.idbd}</th>
              <th>${item.emailsell}</th>
              <th style="width:30px;">
                <button type="button" name="delete-ti" onclick="deletebl(${item.idbinhluan})" class="btn btn-info">Xóa</button>
              </th>
              </tr>               
                                `    ;

                        });
                        $('tbody').html(output);
                   
                  
                }
            });
            
        } 
    }
    function phantrang(t)
    {
      var output='';
     $.ajax({
       type: "GET",
       url: "{{URL::to('phantrang-bl')}}",
       data: {
         trang: t//t: chi trinh trang so may muốn show
       },
        dataType: "json",
       success: function (data) { 
        $('tbody').html('');
        var output='';   
           data.forEach(function (item) {
                          
                          output+=`<tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                </label>
              </th>
              <th>${item.idbinhluan}</th>
              <th>${item.noidung}</th>
              <th>${item.idbd}</th>
              <th>${item.emailsell}</th>
              <th style="width:30px;">
                <button type="button" name="delete-ti" onclick="deletebl(${item.idbinhluan})" class="btn btn-info">Xóa</button>
              </th>
              </tr>               
                                `    ;
          });
         $('tbody').append(output);

         }
     });
    }
</script>

@endsection