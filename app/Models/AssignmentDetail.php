<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentDetail extends Model
{
    use HasFactory;

    protected $table = 'assignment_details';

    protected $fillable = [
            'project_id',
            'creator_id',
            'assignment_id',
            'current_date',
            'time_to_work'
        ];
}
