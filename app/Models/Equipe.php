<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipe extends Model
{
    use HasFactory, SoftDeletes;
     protected $fillable = [
         'etat_id', 'user_id', 'objectif', 'lieu_travail',
         'long', 'lat', 'debut', 'fin',
         'note', 'remarque',
     ];

    public function user():BelongsTo
    { return $this->belongsTo(User::class); }

    public function etat():BelongsTo
    { return $this->belongsTo(Etat::class); }

}
