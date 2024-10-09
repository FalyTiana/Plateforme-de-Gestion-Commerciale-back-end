<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprises';

    protected $fillable = [
        'nom',
        'pays',
        'ville',
        'numero_adresse',
        'devise',
        'abreviation_devise',
    ];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
}
