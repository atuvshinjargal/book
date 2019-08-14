<?php

namespace App\Http\Middleware;

use Closure;
use App\Student;
use App\Grade;
use Illuminate\Contracts\Auth\Guard;
use Log;

class redirectIfNotCheckLesson
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $student = Student::where('user_id',$this->auth->user()->id)->first();
        $grade = Grade::where(['lesson_id' => $request->lesson, 'student_id' => $student->id])->first();

        if (isset($grade->confirmed) && $grade->confirmed==1)
        {
            return $next($request);
        }
        return redirect()
                    ->route('student.lesson.index')
                    ->withSuccess('Танд энэ хичээлийг судлах эрх байхгүй байна.'); 
    }
}
