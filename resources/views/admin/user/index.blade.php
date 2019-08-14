@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Хэрэглэгчид <small>» харуулах</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/user/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> Хэрэглэгч нэмэх
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
              <th>№</th>
              <th>Үүсгэсэн</th>
              <th>Зассан</th>
              <th>Нэр</th>
              <th>Е-мэйл</th>
              <th>Эрх</th>
              <th data-sortable="false">Хэрэглэгчийг</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td data-order="{{ $user->created_at->timestamp }}">
                  {{ $user->created_at->format('Y-m-d H:i') }}
                </td>
                <td data-order="{{ $user->created_at->timestamp }}">
                  {{ $user->created_at->format('Y-m-d H:i') }}
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role['name'] }}</td>
                <td>
                  <a href="/admin/user/{{ $user->id }}/edit"
                     class="btn btn-xs btn-info">
                    <i class="fa fa-edit"></i> Засах
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