<ul class="nav navbar-nav">
  @if (Auth::check())
    @if (Auth::user()->hasRole('admin'))
      <li @if (Request::is('admin/user*')) class="active" @endif>
        <a href="/admin/user">Хэрэглэгч</a>
      </li>
    @endif
    @if (Auth::user()->hasRole('teacher'))
      <li @if (Request::is('teacher/profile*')) class="active" @endif>
        <a href="{{route('teacher.profile.edit', Auth::user()->teacher['id'])}}">Хувийн мэдээлэл</a>
      </li>
      <li @if (Request::is('teacher/lesson*')) class="active" @endif>
        <a href="/teacher/lesson">Хичээл</a>
      </li>
      <li @if (Request::is('teacher/upload*')) class="active" @endif>
        <a href="/teacher/upload">Файл</a>
      </li>
      <li @if (Request::is('student/profile*')) class="active" @endif>
        <a href="{{route('student.profile.edit', Auth::user()->student['id'])}}">Хувийн мэдээлэл</a>
      </li>
    @endif
    @if (Auth::user()->hasRole('student'))

      <li @if (Request::is('student/lessons*')) class="active" @endif>
        <a href="/student/lessons">Үр дүн</a>
      </li>
    @endif
  @endif
</ul>

<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li @if (Request::is('auth/login*')) class="active" @endif><a href="/auth/login">Нэвтрэх</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/auth/logout">Гарах</a></li>
      </ul>
    </li>
  @endif
</ul>