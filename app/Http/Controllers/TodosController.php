<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;
use App\Todos_finish;
use App\Todo_list;
use Auth;


class TodosController extends Controller
{
    public function index() {
    	$user = Auth::user();
    	return view('todos', compact('user'));
    }

    public function add($todo_list_id) {
        $list = Todo_list::where('id', $todo_list_id)->first();
    	return view('add', compact('list'));
    }

    public function create(Request $request, $todo_list_id) {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$todo = new Todos();
    	$todo->description = $request->description;
    	$todo->todo_list_id = $todo_list_id;
    	$todo->save();
    	return redirect('/todos');
    }

    public function edit($todo_id) {
        $todo = Todos::where('id', $todo_id)->first();
        $list = Todo_list::where('id', $todo->todo_list_id)->first();
    	if(Auth::check() && Auth::user()->id == $list->user_id) {   
    		return view('edit', compact('todo'));
    	} else {
    		return redirect('/');
    	}
    }

    public function update(Request $request, $todo_id) {
        $todo = Todos::where('id', $todo_id)->first();
    	if(isset($_POST['delete'])) {
    		$todo->delete();
    		return redirect('/todos');
    	} elseif (isset($_POST['finish'])) {
            $todos_fin = new Todos_finish();
            $todos_fin->description = $todo->description;
            $todos_fin->todo_list_id = $todo->todo_list_id;
            $todos_fin->started_at = $todo->created_at;
            $todos_fin->finished_at = now();
            $todos_fin->save();
            $todo->delete();
            return redirect('/todos');
        } else {
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$todo->description = $request->description;
    		$todo->save();
    		return redirect('/todos');
    	}
    }

    public function check_finish() {
        $user = Auth::user();
        return view('todos_fin', compact('user'));
    }

    public function add_list() {
        $user = Auth::user();
        return view('create_list', compact('user'));
    }

    public function create_list(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $list = new Todo_list();
        $list->name = $request->name;
        $list->user_id = Auth::id();
        $list->save();
        return redirect('/todos');
    }

    public function delete_list($list_id) {
        $list = Todo_list::where('id', $list_id)->first();
        $todos = Todos::where('todo_list_id', $list_id)->get();
        foreach($todos as $todo) {
            $todo->delete();
        }
        $list->delete();
        return redirect('/todos');
    }
}
