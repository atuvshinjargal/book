@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Нэвтрэх</div>
          <div class="panel-body">

            @include('teacher.partials.errors')
            @include('teacher.partials.success')

            <form class="form-horizontal" role="form" method="POST"
                  action="{{ url('/auth/login') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="col-md-4 control-label">Е-мэйл хаяг</label>
                <div class="col-md-6">
                  <input type="email" class="form-control" name="email"
                         value="{{ old('email') }}" autofocus>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Нууц үг</label>
                <div class="col-md-6">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember"> Намайг сана
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-2 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">Нэвтрэх</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection