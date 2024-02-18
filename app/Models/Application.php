<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'volunteer_id',
        'brief',
    ];

    // It uses post's primay key 'id' to create a foreign key 'post_id' for each application 'one to many relationship
    public function post() {
        return $this->belongsTo(Post::class);
    }
    
    // It uses volunteer's primay key 'id' to create a foreign key 'volunteer_id' for each application 'one to many relationship
    public function volunteer() {
        return $this->belongsTo(Volunteer::class);
    }
}
