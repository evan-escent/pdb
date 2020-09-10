@extends('layouts.app')
@section('content')

<div class=container>
	<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Todos Finished</li>
        </ol>
    </nav>
	@if(Auth::check())
		@foreach($user->Todo_list as $todo_list)
		<div class="card" style="margin-bottom: 20px;">
			<div class="card-header">{{$todo_list->name}}</div>
			<div class="card-body" style="padding-top: 0;">
				<table class="table mt-4" style="margin-top:  15px !important;">
					<thead>
						<tr>
							<th class="col-7">Todos</th>
							<th class="col-2">Created Date</th>
							<th class="col-2">Finish Date</th>
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
		</div>
		@endforeach
		@else
		<div class="card">
			<div class="card-body">
				<h3>You need to log in. <a href="/login">Click here to login</a></h3>
			</div>
		</div>
		@endif
</div>
@endsection