<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JourTravail extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipe_id', 'etat_id', 'user_id', 'objectif',
        'lieu', 'debut', 'fin', 'rapport',
        'photo1', 'photo2', 'photo3', 'debut_long',
        'debut_lat', 'fin_long', 'fin_lat',
    ];
}
