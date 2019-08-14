@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Е-мэйл хаягаа баталгаажуулна уу! </div>
          <div class="panel-body">

            @include('teacher.partials.errors')
            @include('teacher.partials.success')
            <div class="alert alert-warning" role="alert">
              <a href="#" class="alert-link">Та Е-мэйл хаягаа шалгаад батлгаажуулах хаяган дээр дарж баталгаажуулна уу.</a>
            <p> </br>
            Хэрэв баталжуулсан бол <a href="{{url('/')}}">энд</a> дарж нэвтэрч орно уу.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection