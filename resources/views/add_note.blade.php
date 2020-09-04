@extends('layouts.app')

@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
    	<ol class="breadcrumb">
        	<li class="breadcrumb-item"><a href="/home">Home</a>
			</li>
			<li class="breadcrumb-item"><a href="/notes">Note</a>
			</li>
        	<li class="breadcrumb-item active" aria-current="
			page">Add</li>
    	</ol>
	</nav>
	<h2>Add Note</h2>

	<form method="POST" action="/notes/add">
		<div class="form-group">
			<input type="text" name="title" class="form-control" placeholder="Title">
		</div>
		<div class="form-group">
			<textarea name="description" class="form-control" placeholder="Description"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Note</button>
		</div>
		{{csrf_field()}}
	</form>
</div>
@endsection