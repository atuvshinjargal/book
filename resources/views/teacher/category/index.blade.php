@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3><a href="{{route('teacher.lesson.index')}}"> {{$lesson->name}}</a> <small>» хичээлийн задаргаа</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('teacher.{lesson}.category.create',$lesson->id)}}" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> Задаргаа нэмэх
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
              <th>Үүсгэсэн</th>
              <th>Нэр</th>
              <th>Тайлбар</th>
              <th data-sortable="false">Задаргааны</th>
              <th data-sortable="false">Задаргааг</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td data-order="{{ $lesson->created_at->timestamp }}">
                  {{ $category->created_at->format('Y-m-d H:i') }}
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                  <a href="{{route('teacher.{category}.content.index', $category->id)}}"
                     class="btn btn-xs btn-primary">
                    <i class="fa fa-file"></i> Агуулга
                  </a>
                </td>
                <td>
                  <a href="{{route('teacher.{lesson}.category.edit',array($lesson->id, $category->id))}}"
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