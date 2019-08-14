@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Хичээлүүд <small>» харуулах</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/teacher/lesson/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> Хичээл нэмэх
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('teacher.partials.errors')
        @include('teacher.partials.success')

        <table id="lessons-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Код</th>
              <th>Нэр</th>
              <th>Зураг</th>
              <th>Эхлэх өдөр</th>
              <th>Үргэлжлэх 7 хоног</th>
              <th>Дуусах өдөр</th>
              <th data-sortable="false">Хичээлийн</th>
              <th data-sortable="false">Хичээлийг</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lessons as $lesson)
              <tr>
                <td>{{ $lesson->code }}</td>
                <td>{{ $lesson->name }}</td>
                <td>{{ $lesson->image }}</td>
                <td>{{ $lesson->start_date }}</td>
                <td>{{ $lesson->duration_time }}</td>
                <td>{{ $lesson->stop_date }}</td>
                <td>
                  <a href="{{ route('teacher.{lesson}.category.index',$lesson->id) }}"
                     class="btn btn-xs btn-primary">
                    <i class="fa fa-table"></i> Задаргаа
                  </a>
                  <a href="{{ route('teacher.lesson.grade',[$lesson->id,0]) }}"
                     class="btn btn-xs btn-primary">
                    <i class="fa fa-table"></i> Оюутнууд
                  </a>
                </td>
                <td>
                  <a href="/teacher/lesson/{{ $lesson->id }}/edit"
                     class="btn btn-xs btn-info">
                    <i class="fa fa-edit"></i> Засах
                  </a>
                  <a href="/blog/{{ $lesson->slug }}"
                     class="btn btn-xs btn-warning">
                    <i class="fa fa-eye"></i> Харах
                  </a>
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