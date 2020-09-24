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
		        	customButtons: {
		        		addEventButton: {
		        			text: 'Add Event',
		        			click: function() {
		        				window.location.href = "{{ route('calendar_add')}}";
		        			}
		        		}
		        	},
		        	headerToolbar: {
		        		left: 'title',
		        		center: 'dayGridMonth,timeGridWeek,timeGridDay',
		        		right: 'addEventButton,today,prev,next'},
		        	events: [
		        		{
		        			id: '1',
		        			title: 'Dummy',
		        			start: '2020-09-24',
		        			end: '2020-09-26',
		        		}
		        	]
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