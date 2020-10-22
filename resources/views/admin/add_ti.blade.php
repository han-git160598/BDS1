@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm tiện ích
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" id="myform" action="{{URL::to('/save-ti')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tiện ích</label>
                            <input type="text" name="tentienich" class="form-control" id="tenti" placeholder="Tên tiện ích">
                        </div>                                
                        <button type="button" name="save-ti" onclick="kttienich()" class="btn btn-info">Save</button>
                    </form>
                    </div>
                </div>
            </section>

    </div>
  </div>
  <script>
    function kttienich()
    {
        ten=$('#tenti').val();
        $.ajax({
        type: "GET",
        url: "{{URL::to('kt-ti')}}",
        data: {tenti:ten},
        dataType: "json",
        success: function (response) {
          if(response['mes'])
              alert(response['mes']); 
          else
          {
              var r = confirm("Bạn muốn thêm tiện ích ");
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