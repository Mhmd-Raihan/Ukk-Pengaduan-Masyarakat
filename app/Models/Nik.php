<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nik extends Model
{
    use HasFactory;

    protected $table = 'nik';
    protected $fillable = ['nik'];
}
