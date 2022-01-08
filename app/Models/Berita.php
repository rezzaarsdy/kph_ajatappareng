<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    public function berita_category()
    {
        return $this->belongsTo(Berita_category::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
