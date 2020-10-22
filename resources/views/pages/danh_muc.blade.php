@extends('layout_FE')
@section('content') 


      <div class="row mb-5">
        <div class="col-12">
          <div class="site-section-title">
            <h2>New Properties for You</h2>
          </div> 
        </div>
      </div>
      <div class="row mb-5">
         @foreach($danhmuc as $value)
        <div class="col-md-6 col-lg-4 mb-4">
          <a href="{{URL::to('/chi-tiet-bds/'.$value->idbd)}}" class="prop-entry d-block">
            <figure>
              <img  src="/aaa/uploads/{{$value->urlhinh}}" height="320" width="450" alt="Image" >
            </figure>

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
                    <strong>{{$value->quan}}</strong>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
       
        @endforeach
      </div>
      <div class="row" >
        <div class="col-md-12 text-center">
          <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                
                {{ $danhmuc->links() }}
                
              </ul>
            </div>
        </div>  
      </div>



@endsection

