<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * class App\Models\SpentTime
 * @property $task_id
 * @property $user_id
 * @property $time_spent
 */
class SpentTime extends Model
{
    use HasFactory;

    protected $table = 'spent_time';

    protected $guarded = [];
}
