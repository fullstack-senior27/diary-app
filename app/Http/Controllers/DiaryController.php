<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diaries = Diary::latest()->paginate(5);
        return view('diaries.index', compact('diaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg|max:5120',
        ]);

        $imagePath = $request->file('image')?->store('images', 'public');

        Diary::create([
            'date' => $request->date,
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('diaries.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diary $diary)
    {
        return view('diaries.edit', compact('diary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diary $diary)
    {
        $request->validate([
            'date' => 'nullable|date',
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg|max:5120',
        ]);

        if ($request->hasFile('image')) {
            if ($diary->image_path) {
                Storage::disk('public')->delete($diary->image_path);
            }
            $diary->image_path = $request->file('image')->store('images', 'public');
        }

        $diary->date = $request->date;
        $diary->content = $request->content;
        $diary->save();

        return redirect()->route('diaries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diary $diary)
    {
        if ($diary->image_path) {
            Storage::disk('public')->delete($diary->image_path);
        }
        $diary->delete();

        return redirect()->route('diaries.index');
    }
}
