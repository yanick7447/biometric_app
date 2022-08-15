<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;
     protected $fillable = [
         'etat_id', 'user_id', 'objectif', 'lieu_travail',
         'long', 'lat', 'debut', 'fin',
         'note', 'remarque',
     ];
}
