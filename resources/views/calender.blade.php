@extends('layouts.app')

@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
    	<ol class="breadcrumb">
        	<li class="breadcrumb-item"><a href="/home">Home</a>
			</li>
        	<li class="breadcrumb-item active" aria-current="
			page">Calendar</li>
    	</ol>
	</nav>
	<div class="panel panel-primary">
		<div class="panel-body">
			<script type="text/javascript">	
		      document.addEventListener('DOMContentLoaded', function() {
		        var calendarEl = document.getElementById('calendar');
		        var calendar = new FullCalendar.Calendar(calendarEl, {
		        	headerToolbar: {center: 'dayGridMonth,timeGridWeek,timeGridDay'},
		        });
		        calendar.setOption()
		        calendar.render();
		      });
			</script>
			<div id='calendar' style='width:70%; margin-left: 10%;'></div>
		</div>
	</div>
</div>
@endsection