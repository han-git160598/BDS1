@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Danh Sách Danh mục
      </div>
      <div style="font-size: 50px">
        <a href="{{URL::to('/form-add-dm')}}" class="btn btn-compose">Thêm danh muc</a>
      </div>
      <div class="table-responsive">
        
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Mã danh mục</th>
              <th>Tên danh mục</th>
              <th style="width:30px;"></th>
            </tr>
           
          </thead>
          <tbody>
              @foreach($alldm as $k=>$v)
              <tr>
              <th>{{ $v->iddanhmuc }}</th>
              <th id="dm{{ $v->iddanhmuc }}">{{ $v->tendanhmuc }}</th>
              <th style="width:30px;">
                <button type="button" name="edit-dm" onclick="editdm({{ $v->iddanhmuc }})" class="btn btn-info">sữa</button>
                <button type="button" name="delete-dm" onclick="deletedm({{$v->iddanhmuc }})" class="btn btn-info">Xóa</button>
                </th>
              </tr>
              @endforeach
           </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
    function editdm(id)// tao mot the input vs 2 nut save va cancle
    { 
      var a='dm'+id;
        var tendm=$('#'+a).html();
        var s=`<input type="text" id="edit${id}" value="${tendm}"> <button onclick="updatedm(${id})">Save</button><button id="c${id}" onclick="canceldm(${id})" value="${tendm}">Cancel</button>`;
      $('#'+a).html(s);
    }
    function updatedm(id)// khi chon nut save thì update
    {
        var a='edit'+id;
        var b='dm'+id;
        var tendm=$('#'+a).val();
      $.ajax({
          type: "GET",
          url: "{{URL::to('edit-dm')}}",
          data: {iddm : id,tendm:tendm},
          dataType: "json",
          success: function (response) {
            if(response['mes'])
                alert(response['mes']); 
            else
               $('#'+b).html(response[0].tendanhmuc);
          }
      });
    }
    function canceldm(id)// khi chon cancel thì quay lại ban đầu
    {
        var a='c'+id;
        var b='dm'+id;  
        var tendm=$('#'+a).val();
        $('#'+b).html(tendm);
    }
    function deletedm(id)
    {
        var r = confirm("Bạn có chắc muốn xóa không !");
        if (r == true)
         {
          var pass = prompt("Nhập mật khẩu");
            $.ajax({
                type: "GET",
                url: "{{URL::to('delete-dm')}}",
                data: {iddm : id, passwordadmin:pass},
                dataType: "json",
                success: function (response) {
                        if(response['mes'])
                        {
                          alert(response['mes']);
                        }
                        else
                        {
                          var output='';
                          response.forEach(function(item)
                          {                   
                            output+=`<tr>
                                      <th>${item.iddanhmuc}</th>
                                      <th id="dm${item.iddanhmuc}">${item.tendanhmuc}</th>
                                      <th style="width:30px;">
                                        <button type="button" name="edit-dm" onclick="editdm(${item.iddanhmuc})" class="btn btn-info">sữa</button>
                                        <button type="button" name="delete-dm" onclick="deletedm(${item.iddanhmuc})" class="btn btn-info">Xóa</button>
                                        </th>
                                      </tr>    
                                            ` ;
                            });
                                    $('tbody').html(output);
                        }
                          
                   
                  
                }
            });
            
          
        
        } 
    }
</script>
@endsection