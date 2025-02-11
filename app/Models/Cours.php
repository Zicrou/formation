<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function scopeGetTimeAgo($query)
    {
        return $query->whereDate('created_at' , '=', Carbon::today());
    }

    public function produits(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class); // Assuming you have a Like model
    }

    public function isLikedByUser()
    {
        if (Auth::check()) {
            return $this->likes()->where('user_id', Auth::user()->id)->exists();
        }
    }
    
}
