@extends('layouts.frontend') @section('title')
<title>Services - Innova DDB </title>
@endsection 

@section('bodyClass')
blog  legacy-navigation
@endsection

@section('content')
<link rel="stylesheet" href="{{URL::to('public/assets/css/service-box.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div id="main" role="main">
  <div class="service-container">
    <p style="margin-bottom:30px;">
      <span style="color: #FFCB06; font-size: 36px; line-height: 40px;">
        <strong>Our Services</strong>
      </span>
    </p>

    <div class="row">
      @foreach($services as $service)
        <div class="col-md-4 col-sm-6 ">
          <div class="service-box">
            <div class="service-icon" style="background-image:url({{URL::to('public/servicess/'.$service->image)}});background-size:cover;
      background-position:center;">
              <div class="front-content">
                <i class="fa fa-{{$service->icon}}"></i>
                <h3>{{$service->title}}
                </h3>
              </div>
            </div>
            <div class="service-content">
              <h3>{{$service->title}}
              </h3>
              {!!$service->content!!}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection