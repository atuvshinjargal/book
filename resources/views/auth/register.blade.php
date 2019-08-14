@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Бүртгүүлэх</div>
          <div class="panel-body">

            @include('teacher.partials.errors')

            <form class="form-horizontal" role="form" method="post"
                  action="{{ url('/auth/register') }}">
               {!! csrf_field() !!}

              @include('auth._form')
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <img src="{{captcha_src('flat')}}.png" alt="captcha">
                </div>
              </div>
              <div class="form-group">
                <label for="captcha" class="col-md-4 control-label">
                  Зураг дээрх текстийг оруулна уу
                </label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="captcha"
                         id="captcha" value="">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-2 col-md-offset-4">
                  <button type="submit" class="btn btn-success btn-lg">
                    <i class="fa fa-disk-o"></i>
                    Бүртгүүлэх
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection