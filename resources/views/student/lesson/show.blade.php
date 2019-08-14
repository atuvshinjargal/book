@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>{{$lesson->name}} <small>» хичээл </small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('teacher.partials.errors')
        @include('teacher.partials.success')
        <div class="col-md-3">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach($lesson->categories as $i => $category)
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading{{$category->id}}">
                  <h4 class="panel-title">
                    <a @if (!$i==0) class="collapsed" @endif role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$category->id}}" @if ($i==0) aria-expanded="true" @else aria-expanded="false" @endif" aria-controls="collapse{{$category->id}}">
                      {{$category->name}}
                    </a>
                  </h4>
                </div>
                <div id="collapse{{$category->id}}" class="panel-collapse collapse @if ($category->id == $content->category_id) in @endif" role="tabpanel" aria-labelledby="heading{{$category->id}}">
                  <div class="list-group">
                    <ul class="nav nav-pills nav-stacked">
                      @foreach($category->contents as $conten)
                        @if ($week-1 <= $conten->week && $week >= $conten->week)
                          <li role="presentation" @if ($content->id == $conten->id) class="active" @endif><a href="{{route('student.lesson.show',[$lesson->id,$conten->id])}}">{{$conten->week.'. '.$conten->name}}</a></li>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">{!!$content->name!!}</h3>
            </div>
            <div class="panel-body">
              @if (!is_null($content->video))
                <div class="panel panel-default">
                  <div class="panel-body">
	                  <div align="center" class="embed-responsive embed-responsive-16by9">
	                  	<video  class="embed-responsive-item" oncontextmenu="return false;" controls>
											  <source src="{!!asset('uploads/'.$content->video)!!}" type="video/mp4">
											Your browser does not support the video tag.
											</video>
										</div>
                  </div>
                </div>
              @endif
              <div class="panel panel-default">
                <div class="panel-body">
                  {!!$content->text!!}
                  @if ($content->homework)
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="{{ route('student.homework.store',[$lesson,$content]) }}">
                	  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group has-success has-feedback">
                      	<div class="col-md-12">
	                        <label class="control-label" for="file">Даалгавар илгээх</label>
	                        <div class="input-group">
	                          <span class="input-group-addon"><i class="fa fa-file-word-o"></i></span>
	                          <input type="file" class="form-control" id="file" name="file" aria-describedby="inputGroupSuccess1Status">
	                        </div>
	                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
	                        <span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
	                        <p class="help-block">Зөвхөн Word (.docx) өргөтгөлтэй файл илгээх боломжтой.</p>
	                    	</div>
                      </div>
                    <div class="form-group">
                  		<div class="col-md-12">
                  			<label class="control-label" for="text">Тайлбар</label>
                    		<textarea class="form-control" rows="2" name="text" id="text"></textarea>
                  		</div>
	                	</div>
                      <div class="form-group">
                        <div class="col-xs-6 col-md-4">
                          <button type="submit" class="btn btn-success">
                            <i class="fa fa-send"></i>
                            илгээх 
                          </button>
                        </div>
                      </div>
                    </form>
                  @endif
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Багштай холбогдох</h3>
            </div>
            <div class="panel-body">
            <div style="height:330px;overflow-y:auto;" id="messages">
              @foreach($questions as $question)
                <div class="well well-sm"><strong>{{$question->user->name}}: </strong><small>{{$question->text}}</small></div>
              @endforeach
            </div>
              <form class="form-horizontal" role="form" method="post"
                    action="{{ route('student.question.store',[$lesson->id,$content]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <div class="col-md-12">
                    <textarea class="form-control" rows="2" name="text" id="text"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-6 col-md-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                      <i class="fa fa-send"></i>
                      илгээх
                    </button>
                  </div>
                </div>
                <p class="help-block">Устгаж болохгүйг анхаарна уу!</p>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
@stop
@section('scripts')
  <script>
		  if(Request.Cookies["allow"] == null){
		    HttpCookie myCookie = new HttpCookie("allow");
		    myCookie.Value = "true";
		    myCookie.Expires = DateTime.Now.AddSeconds(5);
		    Response.Cookies.Add(myCookie);
		}
				var request = UrlData[0];
		if(Request.Cookies["allow"] != null){
		Response.Redirect(Href("VIDEO PATH", request + ".mp4"));
		}
    $(function() {
      $('#myCollapsible').collapse({
        toggle: true
      });
      var objDiv = document.getElementById("messages");
          objDiv.scrollTop = objDiv.scrollHeight;
    });
  </script>
@stop