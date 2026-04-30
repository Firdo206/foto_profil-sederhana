<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'name', 'title', 'bio',
        'photo', 'email', 'phone', 'location'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function profile()
{
    return $this->hasOne(Profile::class);
}
}