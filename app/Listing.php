<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Listing Model
class Listing extends Model
{
    // Add Many to One Relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
