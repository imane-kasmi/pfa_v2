<?php


// app/Models/Rating.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;
use App\Models\User;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['note_id', 'user_id', 'rating'];

    public function note()
    {
        return $this->belongsTo(Note::class,'note_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
