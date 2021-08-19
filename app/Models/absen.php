<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    protected $table = 'absen';
    protected $fillable = ['user_id','tanggal'];
    use HasFactory;
}
