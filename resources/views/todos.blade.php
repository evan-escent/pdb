@extends('layouts.app')
@section('content')

<div class=container>
	<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Todos</li>
        </ol>
    </nav>
	<div class="list">
		@if(Auth::check())
		<div class="accordion" role="tablist" aria-multiselectable="true">
			@foreach($user->Todo_list as $todo_list)
			<div class="card" style="margin-bottom: 20px;">
				<div class="card-header" role="tab" id="heading{{$todo_list->id}}">
					<button class="btn btn-dark" data-toggle="collapse" data-parent="#accordion" data-target="#collapse{{$todo_list->id}}" aria-expanded="true" aria-controls="collapse{{$todo_list->id}}">{{$todo_list->name}}</button>
					
					<button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-cog"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="/list/delete/{{$todo_list->id}}">@lang('lang.delete_list')</a>
					</div>
				</div>

				<div id="collapse{{$todo_list->id}}" class="collapse show" aria-labelledby="heading{{$todo_list->id}}" data-parent="#accordion">
					<div class="card-body" style="padding-top: 0;">
						<table class="table mt-4" style="margin-top:  15px !important;">
							<thead>
								<tr>
									<th class="col-5">@lang('lang.todos')</th>
									<th class="col-2">@lang('lang.create_at')</th>
									<th class="col-2">@lang('lang.action')</th>
								</tr>
							</thead>
							<tbody>
								@foreach($todo_list->Todos as $todo)
									<tr>
										<td>
											{{$todo->description}}
										</td>
										<td>
											{{$todo->created_at}}
										</td>
										<td>
											<form action="/todos/edit/{{$todo->id}}">
												<button type="submit" name="edit" class="btn btn-secondary"><i class="fas fa-edit"> @lang('lang.edit_todo')</i></button>
												<button type="submit" name="delete" formmethod="POST" class="btn btn-danger"><i class="fas fa-trash-alt"> @lang('lang.delete')</i></button>
												<button type="submit" name="finish" formmethod="POST" class="btn btn-primary"><i class="fas fa-clipboard-check"> @lang('lang.finish_todo')</i></button>
												{{csrf_field()}}
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<a href="/todos/{{$todo_list->id}}" class="btn btn-primary"><i class="fas fa-plus"> @lang('lang.add_todo')</i></a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@else
			<div class="card-body">
				<h3>You need to log in. <a href="/login">Click here to login</a></h3>
			</div>
		@endif
	</div>
	<a href="/list/create" class="btn btn-info"><i class="fas fa-plus-square"> @lang('lang.create_list')</i></a>
</div>
@endsection