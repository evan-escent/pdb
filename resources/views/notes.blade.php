@extends('layouts.app')
@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
    	<ol class="breadcrumb">
        	<li class="breadcrumb-item"><a href="/home">Home</a>
			</li>
        	<li class="breadcrumb-item active" aria-current="
			page">Note</li>
    	</ol>
	</nav>
	<div class="card">
		@if(Auth::check())
		<div class="card-header">Notes</div>
		<div class="card-body">
			<a href="/notes/add" class="btn btn-primary">@lang('lang.add_note')</a>

			<table class="table mt-4">
				<thead>
					<tr>
						<th colspan="1">@lang('lang.note')</th>
						<th colspan="1">@lang('lang.create_at')</th>
						<th colspan="1">@lang('lang.update_at')</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user->Notes as $note)
					<tr>
						<td>
							<a href="/notes/{{$note->id}}">{{$note->title}}</a>
						</td>
						<td>{{$note->created_at}}</td>
						<td>{{$note->updated_at}}</td>
						<td>
							<form action="/notes/{{$note->id}}">
								<button type="submit" name="delete" formmethod="POST" class="btn btn-danger">@lang('lang.delete')</button>
								{{csrf_field()}}
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<div class="card-body">
			<h3>You need to log in. <a href="/login">Click here to login</a></h3>
		</div>
		@endif
	</div>
</div>
@endsection