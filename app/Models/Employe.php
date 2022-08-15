<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','poste_id','role_id','admin_id',
        'debut','fin','statut',
    ];

    public function user():BelongsTo
    { return $this->belongsTo(User::class); }

    public function poste():BelongsTo
    { return $this->belongsTo(Poste::class); }

    public function role():BelongsTo
    { return $this->belongsTo(Role::class); }

    public function admin():BelongsTo
    { return $this->belongsTo(User::class, 'admin_id'); }
}
