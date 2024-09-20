<?php

namespace App\Http\Controllers\Api;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    //index
    public function index(Request $request)
    {
        $notes = Note::where('user_id',$request->user()->id)->orderBy('id','desc')->get();
        return response()->json(['notes' => $notes], 200);

    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:255'],
            'note' => ['required']
        ]);

        $note = Note::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'note' => $request->note
        ]);

        return response()->json(['note' => $note, 'messsage' => 'Note created successfully'], 200);
    }

}
