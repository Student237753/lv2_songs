<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'genre', 'founded', 'active_till',
    ];

    protected static function booted()
    {
        static::creating(function ($band) {
            if (is_null($band->active_till)) {
                $band->active_till = 'Still active';
            }
        });
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
