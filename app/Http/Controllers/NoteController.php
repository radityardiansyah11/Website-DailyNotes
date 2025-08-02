<?php

namespace App\Http\Controllers;

use App\Models\Note;
use GuzzleHttp\Psr7\Message;
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
            'title' => $request->input('title'),
            'content' => $request->input('content'),

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

    public function togglePin($id)
    {
        $note = Note::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $note->is_pinned = !$note->is_pinned;
        $note->save();

        return response()->json(['success' => true, 'is_pinned' => $note->is_pinned]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $note->title = $request->input('title');
        $note->content = $request->input('content');
        $note->save();

        return response()->json(['success' => true]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $userId = auth()->id();

        $results = Note::where('user_id', $userId)
            ->where('is_archived', false)
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%$query%")
                    ->orWhere('content', 'like', "%$query%");
            })
            ->orderBy('is_pinned', 'desc')
            ->latest()
            ->get();

        return response()->json($results);
    }

}
