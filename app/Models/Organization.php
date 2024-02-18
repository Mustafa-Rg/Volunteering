<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location',
        'category',
        'brief',
        'phone_number',
        'logo_path',
    ];

    // It takes a primary key from users table and made the foreign key 'organization_id'.
    public function user() {
        return $this->belongsTo(User::class);
    }

    // The primay key 'id' has one to many relationship with posts table
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
