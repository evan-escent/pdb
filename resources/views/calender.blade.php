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
		          initialView: 'dayGridMonth'
		        });
		        calendar.render();
		      });
			</script>
			<div id='calendar'></div>
		</div>
	</div>
</div>
@endsection