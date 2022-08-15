<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pointage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'equipe_id', 'employe_id', 'jour_travail_id',
        'type_id', 'date_pointage', 'long', 'lat',
    ];

    public function user():BelongsTo
    { return $this->belongsTo(User::class); }

    public function equipe():BelongsTo
    { return $this->belongsTo(Equipe::class); }

    public function employe():BelongsTo
    { return $this->belongsTo(Employe::class); }

    public function jourTravail():BelongsTo
    { return $this->belongsTo(JourTravail::class); }

    public function type():BelongsTo
    { return $this->belongsTo(TypePointage::class, 'type_id'); }
}
