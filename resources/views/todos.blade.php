@extends('layouts.app')
@section('content')

<div class=container>
	<div class="card">
		@if(Auth::check())
			@foreach($user->Todo_list as $todo_list)
			<div class="card-header">{{$todo_list->name}}</div>
			<div class="card-body">
				<table classs="table mt-4">
					<thead>
						<tr>
							<th colspan="1">Todos</th>
							<th colspan="1">Created Date</th>
							<th colspan="1"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($todo_list->Todos as $todo)
							<tr>
								<td colspan="1">
									{{$todo->description}}
								</td>
								<td colspan="1">
									{{$todo->created_at}}
								</td>
								<td colspan="1">
									<form action="/todos/edit/{{$todo->id}}">
										<button type="submit" name="edit" class="btn btn-secondary">Edit</button>
										<button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
										<button type="submit" name="finish" formmethod="POST" class="btn btn-primary">Finish</button>
										{{csrf_field()}}
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<a href="/todos/{{$todo_list->id}}" class="btn btn-primary">ADD</a>
			</div>
			@endforeach
			<a href="/list/create" class="btn btn-primary">CREATE TODO LIST</a>
		@else
			<div class="card-body">
				<h3>You need to log in. <a href="/login">Click here to login</a></h3>
			</div>
		@endif
	</div>
</div>
@endsection