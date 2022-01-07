<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_category extends Model
{
    use HasFactory;
    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
