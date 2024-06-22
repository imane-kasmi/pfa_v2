<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Rating;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'topic_id', 'description', 'keywords', 'photo', 'published_at','ID_utilisateur','is_approved'
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    public function discipline()
    {
        return $this->topic->discipline;
    }
  
    public function getPhotoAttribute($value)
    {
        return asset('storage/' . $value);
    }
    /*public function commentaires()
    {
        return Commentaire::where('ID_note', $this->id)->get();
        //return $this->hasMany(Commentaire::class);
    }*/
    public function commentaires(): HasMany
{
    return $this->hasMany(Commentaire::class, 'ID_note');
}
public function user()
    {
        return $this->belongsTo(User::class, 'ID_utilisateur', 'id');
    }
    // app/Models/Note.php
public function ratings()
{
    return $this->hasMany(Rating::class);
}

public function averageRating()
{
    return $this->ratings()->avg('rating');
}
public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_notes', 'note_id', 'user_id');
    }


    

}

