@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh Sách Tiện ích
      </div>
      <div style="font-size: 50px">
        <a href="{{URL::to('/form-add-ti')}}" class="btn btn-compose">Thêm tiện ích</a>
      </div>
      <div class="table-responsive">
        
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Mã tiện ích</th>
              <th>Tên tiện ích</th>
              <th style="width:30px;"></th>
            </tr>
           
          </thead>
          <tbody>
              @foreach($allti as $k=>$v)
              <tr>
              <th>{{ $v->idtienich }}</th>
              <th id="ti{{  $v->idtienich }}">{{ $v->tentienich }}</th>
              <th style="width:30px;">
                <button type="button" name="edit-ti" onclick="editti({{$v->idtienich}})" class="btn btn-info">Sữa</button>
                <button type="button" name="delete-ti" onclick="deleteti({{$v->idtienich }})" class="btn btn-info">Xóa</button>
                </th>
              </tr>
              @endforeach
           </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    function editti(id)// tao mot the input vs 2 nut save va cancle
    { 
      var a='ti'+id;
        var tenti=$('#'+a).html();
        var s=`<input type="text" id="edit${id}" value="${tenti}"> <button onclick="updateti(${id})">Save</button><button id="c${id}" onclick="cancelti(${id})" value="${tenti}">Cancel</button>`;
      $('#'+a).html(s);
    }
    function updateti(id)// khi chon nut save thì update
    {
        var a='edit'+id;
        var b='ti'+id;
        var tenti=$('#'+a).val();
      $.ajax({
          type: "GET",
          url: "{{URL::to('edit-ti')}}",
          data: {idti : id,idtii : tenti},
          dataType: "json",
          success: function (response) {
           
            if(response['mes'])
            {
                alert(response['mes']);
            }
            else

             $('#'+b).html(response[0].tentienich);
          }
      });
    }
    function canceldm(id)// khi chon cancel thì quay lại ban đầu
    {
        var a='c'+id;
        var b='ti'+id;  
        var tenti=$('#'+a).val();
        $('#'+b).html(tenti);
    }
    function deleteti(id)
    {
         var r = confirm("Bạn có chắc muốn xóa không !");
        if (r == true)
         {
            $.ajax({
                type: "GET",
                url: "{{URL::to('delete-ti')}}",
                data: {idti : id},
                dataType: "json",
                success: function (response) {
                        

                        var output='';
                        response.forEach(function(item)
                         {                   
                            output+=`<tr>
                                <th>${item.idtienich}</th>
                                <th id="ti${item.idtienich}">${item.tentienich}</th>
                                <th style="width:30px;">
                                    <button type="button" name="edit-ti" onclick="editti(${item.idtienich})" class="btn btn-info">Sữa</button>
                                    <button type="button" name="delete-ti" onclick="deleteti(${item.idtienich})" class="btn btn-info">Xóa</button>
                                    </th>
                                </tr>
                                
                                `    

                        });
                        $('tbody').html(output);
                   
                  
                }
            });
            
        } 
    }
</script>
@endsection