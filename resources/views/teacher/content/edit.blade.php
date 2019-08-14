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
        <h3>{{$lesson->name}} <small>» хичээлийн {{$name}} агуулгыг засах</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Агуулга засах</h3>
          </div>
          <div class="panel-body">

            @include('teacher.partials.errors')
            @include('teacher.partials.success')

            <form class="form-horizontal" role="form" method="POST"
                  action="{{ route('teacher.{category}.content.update', array($category->id,$id)) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">

              @include('teacher.content._form')

              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                            name="action" value="continue">
                      <i class="fa fa-floppy-o"></i>
                      Хадгалах
                    </button>
                    <button type="submit" class="btn btn-success btn-lg"
                            name="action" value="finished">
                      <i class="fa fa-floppy-o"></i>
                      Хадгалаад дуусгах
                    </button>
                    <button type="button" class="btn btn-danger btn-lg"
                            data-toggle="modal" data-target="#modal-delete">
                      <i class="fa fa-times-circle"></i>
                      Устгах
                    </button>
                  </div>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>

    {{-- Confirm Delete --}}
    <div class="modal fade" id="modal-delete" tabIndex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              ×
            </button>
            <h4 class="modal-title">Анхаар!</h4>
          </div>
          <div class="modal-body">
            <p class="lead">
              <i class="fa fa-question-circle fa-lg"></i>  
              Та энэ хичээлийг устгахдаа итгэлтэй байна уу?
            </p>
          </div>
          <div class="modal-footer">
            <form method="POST" action="{{ route('teacher.{category}.content.destroy', array($category->id, $id)) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="DELETE">
              <button type="button" class="btn btn-default"
                      data-dismiss="modal">Хаах</button>
              <button type="submit" class="btn btn-danger">
                <i class="fa fa-times-circle"></i> Тийм
              </button>
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
