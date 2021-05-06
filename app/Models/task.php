<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table = 'task';
    protected $fillable = ['judul','course','for_class','file','deadline'];
    use HasFactory;
}
