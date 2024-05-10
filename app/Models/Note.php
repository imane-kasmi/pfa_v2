<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'topic_id', 'description', 'keywords', 'photo', 'published_at'
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
    

}

