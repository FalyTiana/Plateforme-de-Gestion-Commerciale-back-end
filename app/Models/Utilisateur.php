<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'entreprise_id',
        'nom',
        'prenom',
        'email',
        'telephone',
        'mot_de_passe',
        'post',
    ];

    protected $hidden = [
        'mot_de_passe',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function setMotDePasseAttribute($value)
    {
        // Mutator pour hacher le mot de passe automatiquement
        $this->attributes['mot_de_passe'] = Hash::make($value);
    }
}
