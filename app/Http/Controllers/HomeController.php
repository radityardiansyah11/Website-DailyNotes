<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class HomeController extends Controller
{
    // Fungsi index akan menampilkan halaman home
    public function index()
    {
        $user = Auth::user();

        // Ambil semua catatan milik user yang sedang login
        $notes = Note::where('user_id', $user->id)->orderBy('is_pinned', 'desc')->get();

        return view('home', compact('notes'));
    }
}
