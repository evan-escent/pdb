@extends('layouts.app')
@section('content')

<div class=container>
	<div class="card">
		@if(Auth::check())
			@foreach($user->Todo_list as $todo_list)
			<div class="card-header">{{$todo_list->name}}</div>
			<div class="card-body">
				<table class="table mt-4">
					<thead>
						<tr>
							<th colspan="1">Todos</th>
							<th colspan="1">Created Date</th>
							<th colspan="1">Finish Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($todo_list->Todos_finish as $todo)
							<tr>
								<td>
									{{$todo->description}}
								</td>
								<td>
									{{$todo->started_at}}
								</td>
								<td>
									{{$todo->finished_at}}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@endforeach
		@else
			<div class="card-body">
				<h3>You need to log in. <a href="/login">Click here to login</a></h3>
			</div>
		@endif
	</div>
</div>
@endsection