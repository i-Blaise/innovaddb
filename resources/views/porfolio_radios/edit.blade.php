@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Portfolio Radios - Edit #{{$porfolio_radio->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('admin.porfolio_radios.update', $porfolio_radio->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">Title</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ is_null(old("title")) ? $porfolio_radio->title : old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('image')) has-error @endif">
                            <label for="image-field">Image</label>
                         <input type="file" id="image-field" name="image" class="form-control" value="{{ is_null(old("image")) ? $porfolio_t_v->image : old("image") }}"/>
                            @if($errors->has("image"))
                             <span class="help-block">{{ $errors->first("image") }}</span>
                            @endif
                         </div>
                    <div class="form-group @if($errors->has('link')) has-error @endif">
                       <label for="link-field">Link</label>
                    <input type="text" id="link-field" name="link" class="form-control" value="{{ is_null(old("link")) ? $porfolio_radio->link : old("link") }}"/>
                       @if($errors->has("link"))
                        <span class="help-block">{{ $errors->first("link") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.porfolio_radios.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
