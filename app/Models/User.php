<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom', 'email', 'password','cni',
        'matricule','prenom','ddn','sexe',
        'empreinte1','empreinte2','empreinte3','avatar',
        'tel1','tel2','quartier',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ 'email_verified_at' => 'datetime',];

    public function employe():HasMany
    { return $this->hasMany(Employe::class); }

    public function hasActiveAcc(){
        $acc = Employe::query()->where('user_id',$this->id)->where('statut',true)->first();
        if($acc === null) return false;
        return true;
    }
}
