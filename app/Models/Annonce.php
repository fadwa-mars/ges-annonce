<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'annonce';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titre', 'description', 'type', 'ville', 'superficie', 'neuf', 'prix', 'photo'
    ];
}