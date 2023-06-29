<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Models\User;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserService extends Service
{
    /**
     * Get List Routes
     *
     * @return Builder[]|Collection
     */
    public function getListAdmin(): Collection|array
    {
        return Admin::query()
            ->select(['id', 'email', 'password'])
            ->get();
    }




    /**
     * Create
     *
     * @param $request
     */
    public function create($data)
    {
        Admin::create($data);
    }


    /**
     * Edit
     *
     * @param $id
     * 
     * @return $banner
     */
    public function edit($id)
    {
       
    }
    /**
     * Create
     *
     * @param $request
     */
    public function update($user, $data)
    {

    }

    /**
     * Delete
     *
     * @param $id
     */
    public function delete($id)
    {
      
    }
}
