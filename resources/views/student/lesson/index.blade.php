@extends('teacher.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Үнэлгээ <small>» үр дүн харах </small></h3>
      </div>
    </div>
  <script type="text/javascript" src="/assets/js/canvasjs.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
        
        @include('teacher.partials.errors')
        @include('teacher.partials.success')
        
        <form class="form-horizontal" role="form" method="post"
                  action="{{ url('/student/lessons') }}">
               {!! csrf_field() !!}
        <div class="container">
		    <div class='col-md-5'>
		        <div class="form-group">
		            <div class='input-group date' id='datetimepicker6' >
		                <input type='text' class="form-control" name='first' value='{{ $first }}'/>
		                <span class="input-group-addon">
		                    <span class="glyphicon glyphicon-calendar"></span>
		                </span>
		            </div>
		        </div>
		    </div>
		    <div class='col-md-5'>
		        <div class="form-group">
		            <div class='input-group date' id='datetimepicker7' >
		                <input type='text' class="form-control" name='last' value='{{ $last }}'/>
		                <span class="input-group-addon">
		                    <span class="glyphicon glyphicon-calendar"></span>
		                </span>
		            </div>
		        </div>
		    </div>
		    <div class='col-md-5'>
		        <div class="form-group">
                  <button type="submit" class="btn btn-success btn">
                    <i class="fa fa-disk-o"></i>
                    Харах
                  </button>
                </div>
            </div>
		</div>
		</form>
		<script type="text/javascript">
		
		    $(function () {
		        $('#datetimepicker6').datetimepicker({
			         format : 'YYYY-MM-DD HH:mm:ss'
			    });
		        $('#datetimepicker7').datetimepicker({
		        	 format : 'YYYY-MM-DD HH:mm:ss',
		            useCurrent: false //Important! See issue #1075
		        });
		        $("#datetimepicker6").on("dp.change", function (e) {
		            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
		        });
		        $("#datetimepicker7").on("dp.change", function (e) {
		            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
		        });
		    });
		</script>
	
	<div class="row">
		@foreach ($votes as $vote)
	    	<div class="col-xs-6 col-md-4">
				<div id="chartContainer{{$vote->name}}" style="height: 300px; width: 100%;">
	    		</div>
	    	</div>
	   	@endforeach
	   </div>
		  <script type="text/javascript">
	  window.onload = function () {
	  @foreach ($votes as $vote)
	    var chart{{$vote->name}} = new CanvasJS.Chart("chartContainer{{$vote->name}}",
	    {
	      title:{
	        text: "Дугаар №{{$vote->name}}"    
	      },
	      animationEnabled: true,
	      axisY: {
	        title: "Үнэлгээ(тоо)"
	      },
	      legend: {
	        verticalAlign: "bottom",
	        horizontalAlign: "center"
	      },
	      theme: "theme2",
	      data: [
	
	      {        
	        type: "column",  
	        showInLegend: true, 
	        legendMarkerColor: "grey",
	        legendText: "үр дүн",
	        dataPoints: [      
	        {y: {{$vote->best}}, label: "Best", color: "#39D700"},
	        {y: {{$vote->good}},  label: "Good", color: "#FFD601" },
	        {y: {{$vote->bad}},  label: "Bad", color: "#CB0303"}       
	        ]
	      }   
	      ]
	    });
	
	    chart{{$vote->name}}.render();
	    @endforeach
	  }
	  
	  </script>


@stop