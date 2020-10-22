@extends('layout_ql_bd')
@section('us_content') 
 
 <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://127.0.0.1:8000/frontend/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Tin tức</span>
            <h1 class="mb-2">Tin tức bất động sản</h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>
          </div>
        </div>
      </div>
    </div>


 @foreach($tintuc as $value)
    <div class="site-section border-top bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <a target="blank" href="{{URL::to($value->slug)}}"><img src="{{URL::to($value->hinhanh)}}" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-md-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title mb-3">
              <h2>{{$value->tieude}}</h2>
            </div>
            <p>{{$value->mota}}</p>
          </div>
        </div>
      </div>
    </div>

    @endforeach
    <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
               {{$tintuc->links()}}
            </div>
          </div>  
        </div>
@endsection