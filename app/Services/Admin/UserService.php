<?php

namespace App\Services\Admin;

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
    public function getListUsers(): Collection|array
    {
        return User::query()
            ->select(['id', 'email', 'password', 'name'])
            ->get();
    }




    /**
     * Create
     *
     * @param $request
     */
    public function create($data)
    {
        User::create($data);
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
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }

        return $user;
    }
    /**
     * Create
     *
     * @param $request
     */
    public function update($user, $data)
    {
        if (!$user) {
            abort(404);
        }

        $user->update([
            'email' => $data['email'],
            'password' => $data['password'],
            'name' => $data['name'],
        ]);
    }

    /**
     * Delete
     *
     * @param $id
     */
    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
