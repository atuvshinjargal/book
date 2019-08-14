@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3><a href="{{route('teacher.lesson.index')}}"> {{$lesson->name}}</a> <small>» хичээлийг</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('teacher.partials.errors')
        @include('teacher.partials.success')

        <ul class="nav nav-tabs">
          <li role="presentation" @if ($confirmed == 0) class="active" @endif><a href="{{ route('teacher.lesson.grade',[$lesson->id,0]) }}">сонгосон оюутнууд</a></li>
          <li role="presentation" @if ($confirmed == 1) class="active" @endif><a href="{{ route('teacher.lesson.grade',[$lesson->id,1]) }}">судалж буй оюутнууд</a></li>
        </ul>
        <table id="lessons-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Код</th>
              <th>Овог</th>
              <th>Нэр</th>
              <th>Хичээл судлах эрх</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($grades as $grade)
              <tr>
                <td>{{ $grade->student->code }}</td>
                <td>{{ $grade->student->firstname }}</td>
                <td>{{ $grade->student->lastname }}</td>
                <td>
                  @if ($confirmed == 0)
                    <a href="{{route('teacher.lesson.grade.confirm',$grade->id)}}"
                       class="btn btn-xs btn-info">
                      <i class="fa fa-check"></i> Олгох
                    </a>
                  @else
                    <a href="{{route('teacher.lesson.grade.close',$grade->id)}}"
                       class="btn btn-xs btn-info">
                      <i class="fa fa-close"></i> Цуцлах
                    </a>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@stop

@section('scripts')
  <script>
    $(function() {
      $("#lessons-table").DataTable({
        order: [[0, "desc"]]
      });
    });
  </script>
@stop