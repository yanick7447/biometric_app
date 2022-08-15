<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipeEmploye extends Model
{
    use HasFactory;

    protected $fillable = ['employe_id', 'equipe_id', 'role_id', 'user_id', 'statut',];

    public function employe():BelongsTo
    { return $this->belongsTo(Employe::class); }

    public function equipe():BelongsTo
    { return $this->belongsTo(Equipe::class); }

    public function role():BelongsTo
    { return $this->belongsTo(Role::class); }

    public function user():BelongsTo
    { return $this->belongsTo(User::class); }
}
