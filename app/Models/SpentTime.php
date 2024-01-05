<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpentTime extends Model
{
    use HasFactory;

    protected $table = 'spent_time';

    protected $guarded = [];
}
