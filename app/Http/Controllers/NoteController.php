<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Topic;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Auth;
class NoteController extends Controller
{
   /* public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }*/
    public function __construct(){
        $this->middleware('auth');
    }
    public function addNote()
{
    $disciplines = Discipline::all();
    return view('notes.add-note', ['disciplines' => $disciplines]);
}

public function displayNotes()
{
    $notes = Note::orderBy('published_at', 'desc')->get();

    return view('notes.display-note', compact('notes'));
}
/*public function show(Note $note)
{
    return view('notes.display-one-note', compact('note'));
}*/
public function show($id)
{
    $note = Note::findOrFail($id);
    return view('notes.display-one-note', compact('note'));
}



public function storeNote(Request $request)
{
    $ID_utilisateur = Auth::id();

    $id_discipline = $request->input('discipline_id');
    $topic = new Topic;
    $topic->name = $request->input('topic');
    $topic->discipline_id = $id_discipline;
    $topic->save();
    $note = new Note;
    $note->title = $request->input('title');
    $note->topic_id = $topic->id; // Récupérer l'identifiant de la rubrique créée
    $note->description = $request->input('description');
    $note->keywords = $request->input('keywords');
	$note->published_at = now();
      // Traitement de la photo
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public'); // Stocke la photo dans storage/app/public/photos
        $note->photo = $photoPath;
    }
    // Sauvegarder la note
    $note->ID_utilisateur = $ID_utilisateur;
    $note->save();  // Redirection ou réponse appropriée
    return redirect()->route('notes.display-note')->with('success', 'Note ajoutée avec succès');
}



    /*public function create()
    {
        $topics = Topic::all();

        return view('notes.create', ['topics' => $topics]);
    }*/

   /* public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topic_id' => 'required|integer',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'required|date',
        ]);

        $note = Note::create([
            'title' => $request->title,
            'topic_id' => $request->topic_id,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'photo' => $request->file('photo')->store('notes'),
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('notes.index');
    }*/
    /*public function display()
{
    $notes = Note::with('discipline')->get();
    return response()->json(['notes' => $notes]);
}*/

    /*public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }*/

    public function edit(Note $note)
    {
        $topics = Topic::all();

        return view('notes.edit', ['note' => $note, 'topics' => $topics]);
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topic_id' => 'required|integer',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'required|date',
        ]);

        $note->update([
            'title' => $request->title,
            'topic_id' => $request->topic_id,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'photo' => $request->file('photo')->store('notes'),
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index');
    }
}