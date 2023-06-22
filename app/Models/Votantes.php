<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votantes extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellido_pat','apellido_mat','email','telefono'];
}
