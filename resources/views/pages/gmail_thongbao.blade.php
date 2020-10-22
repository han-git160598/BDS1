
Cám ơn đã sử dụng dịch vụ của chúng tôi, vui lòng xem lại thông tin bạn đã hẹn: 
link bds: <a href="{{URL::to('/chi-tiet-bds/'.$idbd )}}">Xem bài đăng bất động sản</a>

               

                <h3 class="h4 text-black widget-title mb-3">Đặt lịch hẹn</h3>
             <form>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="label" value="{{$tenkh}}"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="label" value="{{$mail}}" class="form-control">         
                </div>
                <div class="form-group">
                  <label for="phone">Số điện thoại</label>
                  <input type="label"  value="{{$sdtkh}}" class="form-control">

                </div>

                <div class="form-group">
                  <label for="email">Thời gian</label>
                  <input type="datetime-local" value="{{$thoigianhen}}"  class="form-control">
                </div>
                </form>