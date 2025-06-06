<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'singer',
        'release_date',
    ];

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }
}