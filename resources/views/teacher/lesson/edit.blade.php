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
        <h3>Хичээлүүд <small>» хичээл засах</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Хичээл засах</h3>
          </div>
          <div class="panel-body">

            @include('teacher.partials.errors')
            @include('teacher.partials.success')

            <form class="form-horizontal" role="form" method="POST"
                  action="{{ route('teacher.lesson.update', $id) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">

              @include('teacher.lesson._form')

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
            <form method="POST" action="{{ route('teacher.lesson.destroy', $id) }}">
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
  <script src="/assets/pickadate/picker.js"></script>
  <script src="/assets/pickadate/picker.date.js"></script>
  <script src="/assets/pickadate/picker.time.js"></script>
  <script src="/assets/selectize/selectize.min.js"></script>
  <script>
    Date.prototype.addDays = function(days) {
        this.setDate(this.getDate() + days);
        return this;
    };
    Date.prototype.addWeeks = function(weeks) {
      this.addDays(weeks*7);
      return this;
    };
    var eventCalculate = function() {
      return function() {
        var stop_date = new Date($("#start_date").val());
        $('#stop_date').pickadate('set').set('select',stop_date.addWeeks($("#duration_time").val()));
      };
    };
    $(function() {
      $("#start_date").pickadate({
        format: "yyyy-mm-dd",
          onSet: eventCalculate(),
      });
      $("#stop_date").pickadate({
        format: "yyyy-mm-dd"
      });
      $("#image").selectize({
        create: true,
      });
      $("#duration_time").selectize({
        create: true,
        onChange: eventCalculate(),
      });
    });
  </script>
@stop