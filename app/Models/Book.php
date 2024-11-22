<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'title',
        'genre',
        'author',
        'condition',
        'user_id',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
