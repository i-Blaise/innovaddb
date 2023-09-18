@extends('layouts.frontend') 

@section('title')
<title>About Us - Innova DDB </title>
@endsection

@section('bodyClass')
page-template page-template-template-page-no-title page-template-template-page-no-title-php page page-id-12676 page-parent page-child parent-pageid-9139  legacy-navigation yellow
@endsection

@section('content')
<style>
    #container {
        background-color: #FFFFFF;
        color: #444444;
        background-image: url({{URL::to('public/assets/img/about-innovaddb.jpg')}});
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
        background-position: right center;
    }

    #global-logo {
        display: none !important;
    }

    article {
        text-align: justify;
    }

    article p {
        background: rgba(255, 255, 255, 0.85);
        margin: 0;
        padding: 10px 20px;
    }
</style>

<div id="main" role="main">
  <article>
    <p>
      <span style="color: #FFCB06; font-size: 36px; line-height: 40px;">
        <strong>Our Culture</strong>
      </span>
    </p>
    {!!$about->content!!}
  </article>
</div>
@endsection