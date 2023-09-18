@extends('layouts.frontend') @section('title')
<title>Awards - Innova DDB </title>
@endsection @section('bodyClass') page-template page-template-template-tiles page-template-template-tiles-php page page page-id-12676
page-parent page-child parent-pageid-9139 legacy-navigation yellow @endsection @section('content')
<div id="container">
  <div id="awards-wrapper">
    <div class="grid-sizer" style='width:25%;'></div>
    @foreach($awards as $award)
      <div class="awards-tile" style='width:25%;'>
        <img src="{{URL::to('public/award/'.$award->image)}}">
        <hgroup>
          <h2>{{$award->title}}</h2>
          <h3>{{$award->year}}</h3>
        </hgroup>
        {!!$award->content!!}
      </div>
    @endforeach
  </div>
</div>
@endsection