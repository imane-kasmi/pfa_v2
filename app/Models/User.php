<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'utilisateurs';
    use Notifiable;

    protected $fillable = [
        'first_name', 'family_name', 'email', 'password', 'university', 'study_field', 'study_level', 'coordinates', 'photo_de_profil',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Adjust the column names for the getters and setters as needed
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value); // Example: Convert the first name to uppercase first letter
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value); // Example: Convert the first name to lowercase
    }

    // Similarly, define getters and setters for other attributes if needed
}

