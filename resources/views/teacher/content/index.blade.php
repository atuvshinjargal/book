@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3><a href="{{route('teacher.lesson.index')}}"> {{$lesson->name}}</a><small>» <a href="{{route('teacher.{lesson}.category.index',$lesson->id)}}"> {{$category->name}} </a>» агуулга</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('teacher.{category}.content.create',$category->id)}}" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> Агуулга нэмэх
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
              <th>Зассан</th>
              <th>Нэр</th>
              <th>Текст</th>
              <th>Видео</th>
              <th>Нээгдэх 7 хоног</th>
              <th data-sortable="false">Агуулгыг</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contents as $content)
              <tr>
                <td data-order="{{ $content->created_at->timestamp }}">
                  {{ $content->created_at->format('Y-m-d H:i') }}
                </td>
                <td data-order="{{ $content->updated_at->timestamp }}">
                  {{ $content->updated_at->format('Y-m-d H:i') }}
                </td>
                <td>{{ $content->name }}</td>
                <td>{{ str_limit($content->text, $limit = 40, $end = '...') }}</td>
                <td>@if (!is_null($content->video)) <i class="fa fa-file-video-o fa-lg fa-fw"></i> @endif {{ $content->video }}</td>
                <td>{{$content->week}}</td>
                <td>
                  <a href="{{route('teacher.{category}.content.edit',array($category->id, $content->id))}}"
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