<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    protected $table = "Instructions";
    protected $casts = [
        'datePublished' => 'date:Y-m-d',
    ];
}
