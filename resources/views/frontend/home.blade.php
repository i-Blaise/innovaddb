@extends('layouts.frontend')

@section('title')
<title>Innova DDB - Imagine. Inspire. Influence</title>
@endsection

@section('bodyClass')
home page-template page-template-template-hero-slider page-template-template-hero-slider-php page page-id-12619 loading legacy-navigation purple
@endsection

@section('content')
<ul id="hero-slider" class="hero-slider">
    @foreach($homes as $index => $home)
    
      <li class="hero-slide">
          <a href="#">
              <img src="{{URL::to('public/banners/'.$home->image)}}" width="823" height="802">
              <div class="hero-copy <?php 
              if (($index+1) % 2 == 0) {
                echo 'bottom';
              }else {
                echo 'top';
              }
            ?> left large three-quarters" style='color:#ffffff;'>
                  {!!$home->title!!}
              </div>

          </a>
      </li>
    @endforeach
</ul>
@endsection