<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Brand extends Model
{
    //
    use HasFactory;
    protected $fillable=['name', 'slug', 'image'];

 
}
