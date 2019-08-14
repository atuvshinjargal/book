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
        <h3>Хичээлүүд <small>» Хичээл нэмэх</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Шинэ хичээл үүсгэх</h3>
          </div>
          <div class="panel-body">

            @include('teacher.partials.errors')

            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('teacher.lesson.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('teacher.lesson._form')

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