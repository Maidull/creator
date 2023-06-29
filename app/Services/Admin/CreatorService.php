<?php

namespace App\Services\Admin;

use App\Models\Creator;
use App\Models\Project;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CreatorService extends Service
{
    /**
     * Get List Routes
     *
     * @return Builder[]|Collection
     */
    public function getListCreators(): Collection|array
    {
        return Creator::query()
            ->select(['id', 'name', 'email', 'password', 'total_time', 'numberof_projects'])
            ->get();
    }
    public function getListNonCreators(Project $project){
        return Creator::query()
             ->select(['id', 'name', 'email', 'password', 'total_time', 'numberof_projects'])
            ->where('id' != $project->id)
            ->get();
    }

    /**
     * Edit
     *
     * @param $id
     * 
     * @return $creator
     */
    public function edit($creator)
    {
        return $creator;
    }
    /**
     * Update
     *
     * @param $request
     */
    public function update($creator, $data)
    {
        if (!$creator) {
            abort(404);
        }

        $creator->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'total_time' => $data['total_time'],
            'numberof_projects' => $data['numberof_projects'],
        ]);
    }

    /**
     * Delete
     *
     * @param $id
     */
    public function delete($creator)
    {
        DB::beginTransaction();
        try {
            $creator->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
