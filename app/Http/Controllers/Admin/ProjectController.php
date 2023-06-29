<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Models\AssignmentDetail;
use App\Models\Project;
use App\Services\Admin\CreatorService;
use App\Services\Admin\ProjectService;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = AdminHelper::getPageTitle('プロジェクト');
        $data['projects'] = ProjectService::getInstance()->getListProjects();

        return view('admin.projects.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = AdminHelper::getPageTitle('プロジェクト');
        $data['users'] = User::all();

        return view('admin.projects.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProjectService::getInstance()->create($request->only(['name', 'description', 'user_id']));
        $data['title'] = AdminHelper::getPageTitle('プロジェクト');
        toastr(trans('admin.response.create', ['name' => 'プロジェクト']));

        return redirect(route('admin.projects.index'))->with(['data', $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignmentDetailArr = [];
        $data['title'] = AdminHelper::getPageTitle('プロジェクトの詳細');
        $assignmentDetails = AssignmentDetail::where('creator_id', $id)->orderBy('current_date', 'ASC')->get()->groupBy('project_id')->mapWithKeys(function ($group, $key) use ($assignmentDetailArr) {
            $assignmentDetailArr[$key] = $group->groupBy('current_date')->mapWithKeys(function ($group1, $key1) {
                return [
                    $key1 =>
                        [
                            'total_time' => $group1->sum('time_to_work')
                        ]
                ];
            });

            return $assignmentDetailArr;
        });

        return view('admin.projects.show', compact('data', 'assignmentDetails', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data['title'] = AdminHelper::getPageTitle('プロジェクト');
        $data['project'] = ProjectService::getInstance()->edit($project);
        $data['users'] = User::all();

        return view('admin.projects.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        ProjectService::getInstance()->update($project,  $request->only(['name', 'description', 'user_id']));
        toastr(trans('admin.response.update', ['name' => 'プロジェクト']));

        return redirect(route('admin.projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        ProjectService::getInstance()->delete($project);
        toastr(trans('admin.response.delete', ['name' => 'プロジェクト']));

        return redirect(route('admin.projects.index'));
    }

    public function assignment(Project $project){
        $data['title'] = AdminHelper::getPageTitle('プロジェクト');
        $data['project'] = ProjectService::getInstance()->edit($project);
        $data['projects'] = ProjectService::getInstance()->getListProjects();
        $data['creators'] = CreatorService::getInstance()->getListCreators();
        $data['users'] = UserService::getInstance()->getListUsers();

        return view('admin.projects.assignment')->with(['data' => $data]);
    }

    public function assign(Request $request){
        $assignment = ProjectService::getInstance()->assign($request->all());
        $data['title'] = AdminHelper::getPageTitle('プロジェクト');
        $data['projects'] = ProjectService::getInstance()->getListProjects();
        return view('admin.projects.index')->with(['data' => $data]);
    }
}
