@extends('layout_ql_bd')
@section('us_content') 
 
 <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(http://127.0.0.1:8000/frontend/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Danh sách</span>
            <h1 class="mb-2">BĐS Yêu Thích Của Bạn</h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>
          </div>
        </div>
      </div>
    </div>

	<div class="site-section site-section-sm bg-light">
      <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <div class="site-section-title">
            <h2>Danh sách BDS yêu thích của bạn</h2>
          </div> 
        </div>
      </div>
      <div class="row mb-5">
         @foreach($luutin as $value)
        <div class="col-md-6 col-lg-4 mb-4"> 
            <div class="prop-more-info">
                <div class="inner d-flex">
        			<a href="{{URL::to('/delete-luutin/'.$value->idluutin)}}"><span class="offer-type bg-danger">Xóa BDS <span class="icon-heart-o"></span></span></a>
        		</div>
        	</div>
          <a href="{{URL::to('/chi-tiet-bds/'.$value->idbd)}}" class="prop-entry d-block">
            @foreach($hinh as $v)
            @if($v->idbd == $value->idbd)
            <figure>
              <img  src="/aaa/uploads/{{$v->urlhinh}}" height="320" width="450" alt="Image" >
            </figure>
            @break
            @endif
            @endforeach
            <div class="prop-text">
              <div class="inner">
                <span class="price rounded">{{$value->giabd}} Tỷ VND</span>
                <h3 class="title">{{$value->tenbd}}</h3>
                <p class="location">{{$value->diachibd}} </p>
                <span class="title">
                  @if($value->loaibd == 0)
                  <span class="offer-type bg-danger">Thuê</span>
                  @else
                  <span class="offer-type bg-success"
                  >Bán</span>
                  @endif
                </span>
              </div>
             
              <div class="prop-more-info">
                <div class="inner d-flex">
                  <div class="col">
                    <span>Diện tích:</span>
                    <strong>{{$value->dientich}}m<sup>2</sup></strong>
                  </div>

                  <div class="col">
                    <span>Beds:</span>
                    <strong>{{$value->phongngu}}</strong>
                  </div>
                  <div class="col">
                    <span>Baths:</span>
                    <strong>{{$value->nhatam}}</strong>
                  </div>
                  <div class="col">
                    <span>Quận:</span>
                    <strong></strong>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
       
        @endforeach
      </div>
  
	</div>
	</div>


@endsection