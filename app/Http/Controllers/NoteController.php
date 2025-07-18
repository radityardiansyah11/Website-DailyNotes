<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Note::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Catatan berhasil di tambahkan!');
    }

    public function destroy($id)
    {
        $note = Note::where('id', $id)->where('user_id', auth()->id())->first();

        if (!$note) {
            return response()->json(['success' => false, 'message' => 'Note not found or unauthorized.'], 404);
        }

        $note->delete();

        return response()->json(['success' => true]);
    }


}

