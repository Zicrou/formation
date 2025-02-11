<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    // use SoftDeletes;
    
    protected $fillable = [
        'cours_id',
        'user_id',
        'paid',
    ];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    
}
