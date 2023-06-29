<?php

namespace App\Services\Admin;

use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Models\Creator;
use App\Models\Project;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProjectService extends Service
{
    /**
     * Get List Routes
     *
     * @return Builder[]|Collection
     */
    public function getListProjects(): Collection|array
    {
        return Project::query()
            ->select(['id', 'name', 'description', 'user_id'])
            ->get();
    }
    public function getListDetailProject(Assignment $assignment): Collection|array{
        return AssignmentDetail::query()
            ->select(['id', 'project_id', 'creator_id', 'current_date', 'time_to_work'])
            ->where('assignment_id', $assignment->id)
            ->get();
    }

    /**
     * Create
     *
     * @param $request
     */
    public function create($data)
    {
        Project::create($data);
    }


    /**
     * Edit
     *
     * @param $id
     * 
     * @return $project
     */
    public function edit($project)
    {
        return $project;
    }
    /**
     * Create
     *
     * @param $request
     */
    public function update($project, $data)
    {
        if (!$project) {
            abort(404);
        }

        $project->update([
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            'description' => $data['description'],
        ]);
    }

    /**
     * Delete
     *
     * @param $id
     */
    public function delete($project)
    {
        DB::beginTransaction();
        try {
            $project->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function assign($data){
        // dd($data);
        Assignment::create([
            'project_id' => $data['project_id'],
            'creator_id' => $data['creator_id'],
            'time_start' => $data['time_start'],
            'time_end' => $data['time_end'],
            'total_time' => 0
        ]);

        $creator = Creator::where(['id' => $data['creator_id']])->first();
        $creator->update([
            'numberof_projects' => $creator->numberof_projects + 1
        ]);
        $creator->save();
    }
}
