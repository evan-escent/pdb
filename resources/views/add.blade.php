@extends('layouts.app')

@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
    	<ol class="breadcrumb">
        	<li class="breadcrumb-item"><a href="/home">Home</a>
			</li>
			<li class="breadcrumb-item"><a href="/todos">Todo</a>
			</li>
        	<li class="breadcrumb-item active" aria-current="
			page">Add</li>
    	</ol>
	</nav>
    <h2>Add New Todo</h2>
	<form method="POST" action="/todos/{{$list->id}}">
		<div class="form-group">
			<textarea name="description" class="form-control" style="height:30vh;"></textarea>
			@if($errors->has('description'))
				<span class="text-danger">{{$errors->first('description')}}</span>
			@endif
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Todo</button>
		</div>
		{{csrf_field()}}
	</form>
</div>
@endsection