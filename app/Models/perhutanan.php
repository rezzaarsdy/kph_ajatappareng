<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perhutanan extends Model
{
    use HasFactory;
    
    public function perhutanan_category(){
        return $this->belongsTo(perhutanan_category::class);
    }
}
