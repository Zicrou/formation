<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Like extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $fillable = [
        'cours_id',
        'user_id',
    ];
    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }
}
