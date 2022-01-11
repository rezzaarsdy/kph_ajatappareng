<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    use HasFactory;
    public function profile_category()
    {
        return $this->belongsTo(Profile_category::class);
    }
}
