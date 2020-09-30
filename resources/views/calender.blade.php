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
	@if(Auth::check())
	<div class="panel panel-primary">
		<div class="panel-body">

			<script type="text/javascript">	
				let events = <?php echo (json_encode($events)) ?>;
				console.log(events);

				let event = new Array();
				events.forEach(eventObj => 
					event.push(
						{'title':eventObj['title'], 
						'start':eventObj['start'], 
						'end':eventObj['end'],
						'eventDisplay':'auto'
					}));
				console.log(event);

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
		        	events: event,
		        	displayEventTime: false,
		        });
		        calendar.setOption()
		        calendar.render();
		      });
			</script>
			<div id='calendar' style='width:70%; margin-left: 10%;'></div>
		</div>
	</div>
	@else
		<div class="card-body">
			<h3>You need to log in. <a href="/login">Click here to login</a></h3>
		</div>
	@endif
</div>
@endsection