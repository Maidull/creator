<?php

namespace App\Services\Customer;

use App\Models\Project;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProjectService extends Service
{
    /**
     * Get List Routes
     *
     * @return Builder[]|Collection
     */
    public function getListProjects($month = null, $year = null): Collection|array
    {
        if (!is_null($month) && !is_null($year)) {
            return Project::whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        }

        return Project::all();
    }
}
