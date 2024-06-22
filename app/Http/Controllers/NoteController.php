<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Topic;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NoteController extends Controller
{
   
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
    public function displayUserNotes($userId)
    {
        $user = User::findOrFail($userId);
        $notes = Note::where('ID_utilisateur', $userId)->orderBy('published_at', 'desc')->get();
        
        return view('notes.display-user', compact('user', 'notes'));
    }
    public function displayMyNotes($userId)
    {
        $user = User::findOrFail($userId);
        $notes = Note::where('ID_utilisateur', $userId)->orderBy('published_at', 'desc')->get();
        
        return view('notes.display-user', compact('user', 'notes'));
    }
    //note_saved 
  /*  public function saveNote(Request $request, $id)
{
    $userId = Auth::id();

    // Vérifier si la note est déjà sauvegardée
    $existingSave = DB::table('saved_notes')->where('note_id', $id)->where('user_id', $userId)->first();

    if ($existingSave) {
        return redirect()->back()->with('message', 'Note déjà sauvegardée');
    }

    // Sauvegarder la note
    DB::table('saved_notes')->insert([
        'note_id' => $id,
        'user_id' => $userId,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect()->back()->with('message', 'Note sauvegardée avec succès');
}

public function displaySavedNotes($userId)
{
    $user = User::findOrFail($userId);
    $savedNotes = DB::table('saved_notes')
        ->join('notes', 'saved_notes.note_id', '=', 'notes.id')
        ->where('saved_notes.user_id', $userId)
        ->select('notes.*')
        ->orderBy('saved_notes.created_at', 'desc')
        ->get();

        return view('user-profile', compact('user', 'notes', 'savedNotes'));
}*/
public function saveNote(Request $request, $id)
{
    $user = Auth::user();
    $note = Note::findOrFail($id);

    $user->savedNotes()->attach($note);

    return redirect()->route('notes.display-note')->with('success', 'Note sauvegardée avec succès.');
}
public function displaySavedNotes()
{
    $user = Auth::user();
    $savedNotes = $user->savedNotes()->with('topic', 'user')->get();

    return view('notes.display-user', compact('savedNotes'));
}

    
}