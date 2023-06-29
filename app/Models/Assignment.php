<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments';

    protected $fillable = [
        'project_id',
        'creator_id',
        'time_start',
        'time_end',
        'total_time'
    ];
}
