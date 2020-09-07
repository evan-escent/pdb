<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;

class NotesController extends Controller 
{
	public function notes() {
        $user = Auth::user();
        return view('notes', compact('user'));
    }

    public function add_notes() {
        $user = Auth::user();
        return view('add_note', compact('user'));
    }

    public function create_notes(Request $request) {
        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->user_id = Auth::id();
        $note->save();
        return redirect('notes');
    }

    public function detail_notes($note_id) {
        if (Note::where('id', $note_id)->exists()) {
            $note = Note::where('id', $note_id)->first();
            if(Auth::check() && Auth::user()->id == $note->user_id) { 
                return view('note_detail', compact('note'));
            } else {
                return redirect('/page_not_found');
            }
        } else {
            return redirect('/page_not_found');
        }
    }

    public function update_notes(Request $request, $note_id) {
        $note = Note::where('id', $note_id)->first();
        if(isset($_POST['delete'])) {
            $note->delete();
            return redirect('notes');
        } else {
            $note->description = $request->description;
            $note->save();
            return redirect('notes');
        }
    }
}