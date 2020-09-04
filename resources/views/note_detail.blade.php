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
			page">{{$note->title}}</li>
    	</ol>
	</nav>
	<div class="card">
		<div class="card-header">{{$note->title}}</div>
		<div class="card-body">
			<form method="POST" action="/notes/{{$note->id}}">
				<textarea name="description" class="form-control" style="height:30vh;">{{$note->description}}</textarea>
				<button type="submit" class="btn btn-primary">Update</button>
				{{csrf_field()}}
			</form>
		</div>
	</div>
</div>
@endsection