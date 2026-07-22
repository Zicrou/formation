<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\HasUuid;


class Like extends Model
{
    use HasFactory, HasUuid;
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
