<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil catatan yang dipin dan tidak dipin (selain yang diarsipkan)
        $pinnedNotes = Note::where('user_id', $user->id)
                            ->where('is_pinned', true)
                            ->where('is_archived', false)
                            ->latest()
                            ->get();

        $otherNotes = Note::where('user_id', $user->id)
                          ->where('is_pinned', false)
                          ->where('is_archived', false)
                          ->latest()
                          ->get();

        return view('home', compact('pinnedNotes', 'otherNotes'));
    }
}
