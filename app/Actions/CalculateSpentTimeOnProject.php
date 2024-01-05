<?php

namespace App\Actions;

class CalculateSpentTimeOnProject
{
    public static function handle($tasks): int
    {
        $spentTime = 0;

        foreach ($tasks as $task){
            $spentTime += $task->spentTimes()->get()->sum('time_spent');
        }

        return $spentTime;
    }
}
