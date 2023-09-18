@extends('layouts.frontend') 

@section('title')
<Title>Radio - Innova DDB </title>
@endsection 

@section('bodyClass') page-template page-template-template-hero-slider
page-template-template-hero-slider-php legacy-navigation 
@endsection 

@section('content')
<div id="creative-wrapper" class="loading">
  <div id="creative-primary">
    <iframe id="creative-video" width="735" height="410" src="//www.youtube.com/embed/?wmode=transparent&amp;autohide=1&amp;showinfo=0&amp;rel=0&amp;vq=hd720"
      frameborder="0" allowfullscreen=""></iframe>
  </div>
  <div id="creative-secondary">
    @foreach($radios as $radio)
      <a href="{{$radio->link}}" data-video="//www.youtube.com/embed/{{substr($radio->link, 7)}}?wmode=transparent&amp;autohide=1&amp;showinfo=0&amp;rel=0&amp;autoplay=1&amp;vq=hd720"
        class="creative-item current">
        <div class="creative-item-text">
          <h2>{{$radio->title}}</h2>
        </div>
        <div class="creative-item-image">
          <img src="{{URL::to('public/portfolios/radios/'.$radio->image)}}" alt="{{$radio->title}}" />
        </div>
      </a>
    @endforeach
  </div>
</div>
@endsection