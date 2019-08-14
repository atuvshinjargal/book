<?php
get('/', function () {
  return redirect('student/lessons');
});
/*  
admin route
*/
$router->group([
  'namespace' => 'Admin',
  'middleware' => ['auth', 'roles'],
  'roles' => ['admin']
], function () {
  resource('admin/user', 'UserController', ['except' => ['show']]);
  get('admin', function () {
    return redirect('admin/user');
  });
});
/*  
manager route
*/
$router->group([
  'namespace' => 'Manager',
  'middleware' => ['auth', 'roles', 'email'],
  'roles' => ['manager']
], function () {
  //get('manager', 'LessonController@show');
});

/*  
Teacher route
*/
$router->group([
  'namespace' => 'Teacher',
  'middleware' => ['auth', 'roles', 'email'],
  'roles' => ['teacher']
], function () {
  get('teacher', function () {
    return redirect('teacher/lesson');
  });
});

/*  
Student route
*/
$router->group([
  'namespace' => 'Student',
  'middleware' => ['auth', 'roles', 'email'],
  'roles' => ['student']
], function () {
  get('student/lessons', ['as' => 'student.lesson.index', 'uses' => 'LessonController@index']);
  post('student/lessons', ['as' => 'student.lesson.indexpost', 'uses' => 'LessonController@indexpost']);
  get('student', function () {
    return redirect('student/lessons');
  });
});


// Logging in and out
get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
post('auth/login', 'Auth\AuthController@postLogin');
get('auth/vote/{name}/{best}/{good}/{bad}/{year}/{month}/{day}/{hour}/{minute}', 'Auth\AuthController@updateVote');
get('auth/logout', 'Auth\AuthController@getLogout');
get('auth/register', 'Auth\AuthController@getRegister');
post('auth/register', 'Auth\AuthController@postRegister');
get('auth/confirm/{confirmationCode}', 'Auth\AuthController@confirm');
get('auth/activate', ['as' => 'auth.activate', 'uses' => 'Auth\AuthController@activate']);


