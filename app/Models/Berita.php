<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $fillable = ['view'];
    use HasFactory, Sluggable;
    public function berita_category()
    {
        return $this->belongsTo(Berita_category::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
