<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $table = 'class';
    use HasFactory;
    public function kelasnya()
    {
        return $this->hasMany(Student::class);
    }
}
