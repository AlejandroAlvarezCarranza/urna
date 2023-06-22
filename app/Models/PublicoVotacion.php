<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicoVotacion extends Model
{
    use HasFactory;
    protected $fillable = ['idvotacion','idvotante'];
}
