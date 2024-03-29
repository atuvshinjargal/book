@extends('teacher.layout')

@section('content')
  <div class="container-fluid">

    {{-- Top Bar --}}
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3 class="pull-left">Файлууд  </h3>
        <div class="pull-left">
          <ul class="breadcrumb">
            @foreach ($breadcrumbs as $path => $disp)
              <li><a href="/teacher/upload?folder={{ $path }}">{{ $disp }}</a></li>
            @endforeach
            <li class="active">{{ $folderName }}</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 text-right">
        <button type="button" class="btn btn-primary btn-md"
                data-toggle="modal" data-target="#modal-file-upload">
          <i class="fa fa-upload"></i> Файл хуулах
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('teacher.partials.errors')
        @include('teacher.partials.success')

        <table id="uploads-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Нэр</th>
              <th>Төрөл</th>
              <th>Үүсгэсэн хугацаа</th>
              <th>Хэмжээ</th>
              <th data-sortable="false">Үйлдэл</th>
            </tr>
          </thead>
          <tbody>

{{-- The Subfolders --}}
@foreach ($subfolders as $path => $name)
  <tr>
    <td>
      <a href="/teacher/upload?folder={{ $path }}">
        <i class="fa fa-folder fa-lg fa-fw"></i>
        <?php $q_path = explode ("/", $path)?>
        {{ end($q_path) }}
      </a>
    </td> 
    <td>Folder</td>
    <td>-</td>
    <td>-</td>
    <td>
      <button type="button" class="btn btn-xs btn-danger"
              onclick="delete_folder('{{ $name }}')">
        <i class="fa fa-times-circle fa-lg"></i>
        Устгах
      </button>
    </td>
  </tr>
@endforeach

{{-- The Files --}}
@foreach ($files as $file)
  <tr>
    <td>
      <a href="{{ $file['webPath'] }}">
        @if (is_image($file['mimeType']))
          <i class="fa fa-file-image-o fa-lg fa-fw"></i>
        @else
          <i class="fa fa-file-o fa-lg fa-fw"></i>
        @endif
        <?php $q_path = explode ("/", $file['webPath'])?>
        {{ end($q_path) }}
      </a>
    </td>
    <td>{{ $file['mimeType'] or 'Unknown' }}</td>
    <td>{{ $file['modified']->format('Y-m-d H:i') }}</td>
    <td>{{ human_filesize($file['size']) }}</td>
    <td>
      <button type="button" class="btn btn-xs btn-danger"
              onclick="delete_file('{{ $file['name'] }}')">
        <i class="fa fa-times-circle fa-lg"></i>
        Устгах
      </button>
      @if (is_image($file['mimeType']))
        <button type="button" class="btn btn-xs btn-success"
                onclick="preview_image('{{ $file['webPath'] }}')">
          <i class="fa fa-eye fa-lg"></i>
          Харах
        </button>
      @endif
    </td>
  </tr>
@endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>

  @include('teacher.upload._modals')

@stop

@section('scripts')
  <script>

    // Confirm file delete
    function delete_file(name) {
      $("#delete-file-name1").html(name);
      $("#delete-file-name2").val(name);
      $("#modal-file-delete").modal("show");
    }

    // Confirm folder delete
    function delete_folder(name) {
      $("#delete-folder-name1").html(name);
      $("#delete-folder-name2").val(name);
      $("#modal-folder-delete").modal("show");
    }

    // Preview image
    function preview_image(path) {
      $("#preview-image").attr("src", path);
      $("#modal-image-view").modal("show");
    }

    // Startup code
    $(function() {
      $("#uploads-table").DataTable();
    });
  </script>
@stop