<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use App\Lesson;
use App\Vote;
use App\Grade;
use App\Content;
use Auth;
use Input;
use DB;
use Carbon\Carbon;

class LessonController extends Controller
{
    public function index()
    {
    	//$student = new Student();
    	//$student = $student->getStudentByUser(Auth::user());
        //if (!isset($student)){
          //  return redirect()
            //->route('student.profile.create');
        //}

        //$lessons = Lesson::where('stop_date','>', Carbon::now())->orderBy('stop_date','DESC')->paginate(6);
        //$student = Student::where('user_id',Auth::user()->id)->first();
		
        //return view('student.lesson.index')
           // ->withLessons($lessons)
            //->withStudent($student);
        $now = Carbon::now();
		$now1 = Carbon::now();
		$now1->subHours(240);
		
        $votes = Vote::select('name',DB::raw('SUM(best) as best'),DB::raw('SUM(good) as good'),DB::raw('SUM(bad) as bad'))
						->where('created_at', '<=', $now)
						->where('created_at', '>=', $now1)
						->groupBy('name')
						->get();
   		
   		return view('student.lesson.index')
            ->withVotes($votes)
            ->withFirst($now1)
            ->withLast($now);
    }
    public function indexpost()
    {
    	$date = Input::all();
    	
        $votes = Vote::select('name',DB::raw('SUM(best) as best'),DB::raw('SUM(good) as good'),DB::raw('SUM(bad) as bad'))
        						->where('created_at', '>=', $date['first'])
        						->where('created_at', '<=', $date['last'])
        						->groupBy('name')
        						->get();
   		
   		return view('student.lesson.index')
            ->withVotes($votes)
            ->withFirst($date['first'])
            ->withLast($date['last']);
    }
    public function choose($lesson_id)
    {
    	$student = Student::where('user_id',Auth::user()->id)->first();
		$grade = Grade::firstOrCreate(['lesson_id' => $lesson_id, 'student_id' => $student->id]);

        return redirect()
            ->route('student.lesson.index')
            ->withSuccess('Сонголт амжилттай боллоо.');
    }
    public function unchoose($grade_id)
    {
        $grade = Grade::findOrFail($grade_id);
        $grade->delete();

        return redirect()
            ->route('student.lesson.index')
            ->withSuccess('Сонголтыг амжилттай цуцаллаа.');
    }
    public function show($id, $content)
    {
        $lesson = Lesson::findOrFail($id);
        $questions = Lesson::find($id)->questions()->where('user_id', Auth::user()->id)->get();
        $started = new Carbon($lesson->start_date);
        $now = Carbon::now();
        $week =ceil((($started->diff($now)->days)+1)/7);

        if ($content != 'a') {
            $content = Content::findOrFail($content);
        } else {
            $content = Content::findOrFail($lesson->categories['0']->contents['0']->id);
        }
        

        return view('student.lesson.show')
                ->withLesson($lesson)
                ->withContent($content)
                ->withQuestions($questions)
                ->withWeek($week);        
    }
}
