<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes);
    }

    public function show(int $id)
    {
        $note = Note::findOrFail($id);
        return response()->json($note);
    }

    public function create(Request $request)
    {
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required',
            'done'=>'required'
        ]);
        $creat_note = Note::create($data);
        return response($creat_note);
    }

    public function edit(Request $request, int $id)
    {
        $note = Note::findOrFail($id);
        $data = request()->validate([
            'name'=>'required',
            'description'=>'required',
            'done'=>'required'
        ]);
        $note->update($data);
        return response(Note::findOrFail($id));
    }

    public function delete(int $id)
    {
        $note = Note::findOrFail($id);
        return response($note->delete());
    }
}
