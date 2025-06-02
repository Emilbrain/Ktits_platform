<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheorySections extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'theory', 'theory_id' ];
}
