<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','poste_id','role_id','admin_id',
        'debut','fin','statut',
    ];
}
