@extends('layouts.app')

@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
    	<ol class="breadcrumb">
        	<li class="breadcrumb-item"><a href="/home">Home</a>
			</li>
			<li class="breadcrumb-item"><a href="/calendar">Calendar</a>
			</li>
        	<li class="breadcrumb-item active" aria-current="
			page">Add</li>
    	</ol>
	</nav>
    <legend>Add Calendar Event</legend>
    <form method="POST" action="/calendar/add">
    	<label>Title:</label><br>
    	<input type="text" class="form-control" name="title"><br>
    	@if($errors->has('title'))
			<span class="text-danger">{{$errors->first('title')}}</span><br><br>
		@endif

    	<label>Start Date:</label><br>
    	<input type="date" name="start" value="<?php echo date('Y-m-d'); ?>"><br><br>
    	<label>End Date:</label><br>
    	<input type="date" name="end" value="<?php echo date('Y-m-d'); ?>"><br><br>
    	<button type="submit" class="btn btn-primary">Create Event</button>
    	{{csrf_field()}}
    </form>
</div>
@endsection