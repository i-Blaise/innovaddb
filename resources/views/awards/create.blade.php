@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Awards / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('admin.awards.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">Title</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('year')) has-error @endif">
                       <label for="year-field">Year</label>
                    <input type="text" id="year-field" name="year" class="form-control" value="{{ old("year") }}"/>
                       @if($errors->has("year"))
                        <span class="help-block">{{ $errors->first("year") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('content')) has-error @endif">
                            <label for="content-field">Content</label>
                            <textarea id="editor" class="form-control" id="content-field" rows="3" name="content">{{ old("content") }}</textarea>
                            @if($errors->has("content"))
                            <span class="help-block">{{ $errors->first("content") }}</span>
                            @endif
                        </div>
                    <div class="form-group @if($errors->has('image')) has-error @endif">
                        <label for="image-field">Image</label>
                    <input type="file"  name="image" class="form-control" value="{{ old("image") }}"/>
                        @if($errors->has("image"))
                        <span class="help-block">{{ $errors->first("image") }}</span>
                        @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.awards.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
