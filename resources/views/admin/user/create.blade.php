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
        <h3>Хэрэглэгчид <small>» Хэрэглэгч нэмэх</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Шинэ хэрэглэгч үүсгэх</h3>
          </div>
          <div class="panel-body">

            @include('teacher.partials.errors')

            <form class="form-horizontal" role="form" method="post"
                  action="{{ route('admin.user.store') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @include('admin.user._form')

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
  <script src="/assets/selectize/selectize.min.js"></script>
  <script>
    $(function() {
      $("#role_id").selectize({
        create: true,
      });
    });
  </script>
@stop