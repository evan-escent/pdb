@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			MY Calender
		</div>
		<div class="panel-body">
			{{!! $calendar->calendar() !!}}
			<script>{{!! $calendar->script() !!}}</script>
		</div>
	</div>
</div>
@endsection