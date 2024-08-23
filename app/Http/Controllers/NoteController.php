<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display the user's home page with their notes.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $notes = $user->notes;

        return view('home', compact('user', 'notes'));
    }
    /**
     * Store a newly created note in the database.
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        return redirect()->route('home')->with('success', 'Note created successfully!');
    }
    /**
     * Show the form for editing the specified note.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $note = Note::find($id);
        return view('note_edit', compact('note'));
    }

    /**
     * Update the specified note in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update($request->all());

        return redirect()->route('home')->with('success', 'Note updated successfully.');
    }

    /**
     * Remove the specified note from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->route('home')->with('success', 'Note deleted successfully.');
    }
}
