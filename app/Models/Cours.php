<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class Cours extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'video',
        'price',
        'disponible',
        'sold',
    ];

    public function tags(): BelongsToMany    
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getSlug()
    {
        return Str::slug($this->title);
    }
}
