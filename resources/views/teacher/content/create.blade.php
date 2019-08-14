@extends('teacher.layout')

@section('styles')
  <link href="/assets/pickadate/themes/default.css" rel="stylesheet">
  <link href="/assets/pickadate/themes/default.date.css" rel="stylesheet">
  <link href="/assets/pickadate/themes/default.time.css" rel="stylesheet">
  <link href="/assets/selectize/css/selectize.css" rel="stylesheet">
  <link href="/assets/selectize/css/selectize.bootstrap3.css" rel="stylesheet">
@stop

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3> <a href="{{route('teacher.{lesson}.category.index',$lesson->id)}}" >{{$lesson->name}} </a> <small>» {{$category->name}} » агуулга нэмэх</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Шинэ агуулга үүсгэх</h3>
          </div>
          <div class="panel-body">

            @include('teacher.partials.errors')

            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('teacher.{category}.content.store', $category->id) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('teacher.content._form')

              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                      <i class="fa fa-disk-o"></i>
                      Хадгалах
                    </button>
                  </div>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@stop
@section('scripts')
  <script src="/assets/ckeditor/ckeditor.js"></script>
  <script src="/assets/selectize/selectize.min.js"></script>
  <script>
    CKEDITOR.replace( 'text' );
    $("#checkVideo").change(function() {
      if(this.checked) {
        $("#video").prop("disabled",false); 
      } else {
        $("#video").prop("disabled",true);
      }
    });
    $(function() {
      $("#week").selectize({
        create: true,
      });
    });
  </script>
@stop