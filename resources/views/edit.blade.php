@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Edit Todo</h1>

	<form method="POST" action="/todos/edit/{{$todo->id}}">
		<div class="form-group">
			<textarea name="description" class="form-control">{{$todo->description}}</textarea>
			@if ($errors->has('description'))
				<span class="text-danger">{{$errors->first('description')}}</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="update" class="btn btn-primary">Update Todo</button>
		</div>
	{{csrf_field()}}
	</form>
</div>

@stop