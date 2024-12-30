<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|max:2048',
        ]);

        $path = $request->file('photo')->store('news', 'public');

        News::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'photo' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('status', 'News created successfully!');
    }
}
