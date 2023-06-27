<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supp extends Model
{
    use HasFactory;


    

        protected $fillable = [
           'reg',
            'course_code',
            'course_name',
            'grade',
        ];
}
