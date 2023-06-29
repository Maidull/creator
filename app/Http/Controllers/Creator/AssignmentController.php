<?php

namespace App\Http\Controllers\Creator;

use App\Helpers\CreatorHelper;
use App\Models\Assignment;
use App\Services\Creator\AssignmentService;
use App\Services\Creator\CreatorService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = CreatorHelper::getPageTitle('プロジェクトリスト');
        $data['assignments'] = CreatorService::getInstance()->getListAssginments(auth()->guard('creator')->user());

        return view('creator.projects.index')->with(['data' => $data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        $data['title'] = CreatorHelper::getPageTitle('プロジェクトリスト');
        $data['detail_assignments'] = AssignmentService::getInstance()->getListDetailAssginments($assignment);

        return view('creator.projects.assignment')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }

    public function setTime(Assignment $assignment){
        $data['title'] = CreatorHelper::getPageTitle('プロジェクトリスト');
        $data['assignment'] = $assignment;

        return view('creator.projects.create')->with(['data' => $data]);
    }

     public function set(Request $request, Assignment $assignment){
        $array = $request->all();
        $array['assignment_id'] = $assignment->id;
        $array['creator_id'] = $assignment->creator_id;
        $array['project_id'] = $assignment->project_id;

        AssignmentService::getInstance()->create($array);

        $data['title'] = CreatorHelper::getPageTitle('プロジェクトリスト');
        $data['assignments'] = CreatorService::getInstance()->getListAssginments(auth()->guard('creator')->user());
        return redirect(route('creator.assignments.index'))->with(['data' => $data]);
    }
}
