<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;
class DashboardController extends Controller
{
    /* dashoard user */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->get();

        $userCount = User::count();

        return view("dashboardUser", compact("users", "search", "userCount"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8",
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('dashboardUser')->with('success', 'User berhasil ditambahkan');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        return response()->json($users);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email",
            "password" => "nullable|string|min:8",
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->password) {
            $user->password = bcrypt($request->password); // Enkripsi password
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Deleted Succes');
    }

    /* dashboard */
    public function dashboard()
    {   
        $userCount = User::count();
        $noteCount = Note::count();
        $archivedCount = Note::where('is_archived', true)->count();
        $recentNotes = Note::latest()->take(4)->get();
        $allNotes = Note::all();

        return view('dashboard', compact('userCount','noteCount','archivedCount','recentNotes', 'allNotes'));
    }
}
