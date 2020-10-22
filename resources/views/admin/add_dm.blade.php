@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" id="myform" action="{{URL::to('/save-dm')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="tendanhmuc" class="form-control" id="tendm" placeholder="Tên danh mục">
                        </div>                                
                        <button type="button" name="save-dm" onclick="ktdanhmuc()" class="btn btn-info">Save</button>
                    </form>
                    </div>
                </div>
            </section>

    </div>
  </div>
  <script>
      function ktdanhmuc()
      {
          ten=$('#tendm').val();
          $.ajax({
          type: "GET",
          url: "{{URL::to('kt-dm')}}",
          data: {tendm:ten},
          dataType: "json",
          success: function (response) {
            if(response['mes'])
                alert(response['mes']); 
            else
            {
               
                var r = confirm("Bạn muốn thêm danh mục ");
                if (r == true) {
                    document.getElementById("myform").submit();
                } else {
                    
                }
            }
               
          }
        });

      }
   </script>
@endsection