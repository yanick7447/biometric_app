<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JourTravail extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipe_id', 'etat_id', 'user_id', 'objectif',
        'lieu', 'debut', 'fin', 'rapport',
        'photo1', 'photo2', 'photo3', 'debut_long',
        'debut_lat', 'fin_long', 'fin_lat',
    ];

    public function user():BelongsTo
    { return $this->belongsTo(User::class); }

    public function equipe():BelongsTo
    { return $this->belongsTo(Equipe::class); }

    public function etat():BelongsTo
    { return $this->belongsTo(Etat::class); }
}
