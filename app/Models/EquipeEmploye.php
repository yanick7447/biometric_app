<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeEmploye extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id', 'equipe_id', 'role_id', 'user_id', 'statut',
    ];
}
