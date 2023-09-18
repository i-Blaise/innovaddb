@extends('layouts.frontend') @section('title')
<title>Print - Innova DDB </title>
@endsection 

@section('bodyClass')
page-template page-template-template-hero-slider page-template-template-hero-slider-php  legacy-navigation
@endsection

@section('content')
<ul id="hero-slider" class="hero-slider">
  @foreach($prints as $print)
  <li class="hero-slide">
    <img src="{{URL::to('public/portfolios/print/'.$print->image)}}" width="925" height="1296">

  </li>
  @endforeach
</ul>
@endsection