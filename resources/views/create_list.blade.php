@extends('layouts.app')

@section('content')

<div class="container">
	<h2>Create Todo List</h2>

	<form method="POST" action="/list/create">
		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="list name">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Create List</button>
		</div>
		{{csrf_field()}}
	</form>
</div>
@endsection