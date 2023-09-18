@extends('layouts.frontend') @section('title')
<title>Clients - Innova DDB </title>
@endsection @section('bodyClass') blog legacy-navigation @endsection @section('content')
<link rel="stylesheet" href="{{URL::to('public/assets/css/clients.css')}}">
<div id="main" role="main">
  <article>
    <p>
      <span style="color: #000000; font-size: 36px; line-height: 40px;">
        <strong>Our Clients</strong>
      </span>
    </p>
    <div class="client-wrap">

      @foreach($clients as $client)
        <div class="client {{$client->title}}">
          <div class="client-more-less"></div>
          <img class="client-logo" src="{{URL::to('public/client/'.$client->image)}}">
        </div>
      @endforeach
    </div>
  </article>
</div>
@endsection