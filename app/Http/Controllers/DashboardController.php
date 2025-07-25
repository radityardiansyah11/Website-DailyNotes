<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // ← Pastikan huruf U besar sesuai model

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->get();

        return view("dashboardUser", compact("users", "search"));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        return response()->json($users);
    }

}
