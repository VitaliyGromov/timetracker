<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * class App\Models\Task
 * @property $id
 * @property $name
 * @property $description
 * @property $status
 * @property $project_id
 * @property $user_id
*/
class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function performer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'performer_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function spentTimes(): HasMany
    {
        return $this->hasMany(SpentTime::class, 'task_id');
    }

    public function spentTimeByUser(int $userId): HasMany
    {
        return $this->HasMany(SpentTime::class, 'task_id')->where('user_id', $userId);
    }
}
