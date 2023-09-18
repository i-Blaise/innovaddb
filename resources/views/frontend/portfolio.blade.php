@extends('layouts.frontend') @section('title')
<title>Portfolio - Innova DDB </title>
@endsection 

@section('bodyClass')
page-template page-template-template-hero-slider page-template-template-hero-slider-php  legacy-navigation
@endsection

@section('content')
<ul id="hero-slider" class="hero-slider">
  @foreach($portfolios as $portfolio)
  <li class="hero-slide">
    <img src="{{URL::to('public/portfolios/'.$portfolio->image)}}" width="925" height="1296">

  </li>
  @endforeach
</ul>
@endsection