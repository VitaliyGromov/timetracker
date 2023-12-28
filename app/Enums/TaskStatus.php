<?php

namespace App\Enums;

enum TaskStatus: string
{
    case NEW = 'new';
    case IN_PROCESS = 'in process';
    case ON_TESTS = 'on tests';
    case RETURNED = 'returned';
    case COMPLETED = 'completed';
}
