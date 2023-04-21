<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterDetail extends Model
{
    use HasFactory;

   protected  $table = 'laravel_task';

   protected $fillable = [
    'name','email','gender','password','image','DOB','degree'
   ];
}
