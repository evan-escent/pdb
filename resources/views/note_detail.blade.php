@extends('layouts.app')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">{{$note->title}}</div>
		<div class="card-body">
			<form method="POST" action="/notes/{{$note->id}}">
				<textarea name="description" class="form-control">{{$note->description}}</textarea>
				<button type="submit" class="btn btn-primary">Update</button>
				{{csrf_field()}}
			</form>
		</div>
	</div>
</div>
@endsection