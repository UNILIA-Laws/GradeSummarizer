<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reg',
        'remark',
        'program'
    ];
}
