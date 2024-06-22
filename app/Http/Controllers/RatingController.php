<?php
// app/Http/Controllers/RatingController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::updateOrCreate(
            ['note_id' => $id, 'user_id' => Auth::id()],
            ['rating' => $request->rating]
        );

        return response()->json(['success' => 'Rating saved successfully']);
    }
}
