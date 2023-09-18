@extends('layouts.frontend') @section('title')
<title>The Team - Innova DDB </title>
@endsection @section('bodyClass') page-template page-template-template-tiles page-template-template-tiles-php page page page-id-12676 page-parent page-child parent-pageid-9139  legacy-navigation yellow @endsection 

@section('content')
<div id="awards-wrapper">
    <div class="grid-sizer" style='width:25%;'></div>

    @foreach($teams as $team)
    <div class="awards-tile" style='width:25%;'>
    <img src="{{URL::to('public/teams/'.$team->image)}}">
          <hgroup>
        <h2>{{$team->name}}</h2>
        <h3>{{$team->position}}</h3>
      </hgroup>
      {!!$team->content!!}
        </div>
      @endforeach
</div>
@endsection