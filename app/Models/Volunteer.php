<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'phone_number',
    ];
    // It takes the primary key from users tables 'id' and made a foreign key 'volunteer_id'.
    public function user() {
        return $this->belongsTo(User::class);
    }

    // There is one to many relationship between volunteer and application where one volunteer could has many applications.
    public function application() {
        return $this->hasMany(Application::class);
    }
}
