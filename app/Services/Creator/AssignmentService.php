<?php

namespace App\Services\Creator;

use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Models\Creator;
use App\Models\Project;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class AssignmentService extends Service
{
    /**
     * Get List Routes
     *
     * @return Builder[]|Collection
     */
    public function getListDetailAssginments(Assignment $assignment){
        return AssignmentDetail::query()
            ->select(['id', 'project_id', 'creator_id', 'current_date', 'time_to_work'])
            ->where('assignment_id', $assignment->id)
            ->get();
    }

    /**
     * show
     *
     * @param $id
     * 
     * @return $assignment
     */

    public function show($assignment)
    {
        return $assignment;
    }

    public function create($data){
        $assigmentdeatail = AssignmentDetail::create([
            'project_id' => $data['project_id'],
            'creator_id' => $data['creator_id'],
            'current_date' => $data['current_date'],
            'time_to_work' => $data['time_to_work'],
            'assignment_id' => $data['assignment_id'],
        ]);

        $assigment = Assignment::where('id', $data['assignment_id'])->first();
        $assigment->update([
            'total_time' => $assigment['total_time'] + $data['time_to_work'],
        ]);
        $assigment->save();
    }
    
}
