<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_category extends Model
{
    use HasFactory;
    public function profile(){
        return $this->belongsToMany(Profile::class);
    }
}
