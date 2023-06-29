<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory, Authenticatable;

    protected $table = 'creators';

    protected $fillable = [
        'name',
        'email',
        'password',
        'total_time',
        'numberof_projects',
        'active',
    ];
}
