<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Pour ne pas tomber sur l'exception MassAssignmentException, nous devons indiquer les propriétés $fillable du modèle
    protected $fillable = [ "title", "picture", "content" ];
}
