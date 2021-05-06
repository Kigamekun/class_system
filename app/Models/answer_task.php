<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer_task extends Model
{
    protected $table = 'answer_task';
    protected $fillable = ['tugas_id','nama','file'];
    use HasFactory;
}
