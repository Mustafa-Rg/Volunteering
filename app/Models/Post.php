<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'title', 
        'description',
        'city',
        'category',
        'hours_of_volunteering'
    ];
    // It's uses organization's primary key 'id' to create a foreign key 'organization_id' for each post 'one to many'.
    public function organization() {

    return $this->belongsTo(Organization::class);

}

    // There is a one to many relationship between posts and applications where each post can have multiple applications.
    public function application() {

        return $this->hasMany(Application::class);
        
    }
}