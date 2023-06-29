<?php

namespace App\Http\Controllers\Creator;

use App\Helpers\CreatorHelper;
use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Services\Creator\AssignmentService;
use App\Services\Creator\CreatorService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AssignmentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\AssignmentDetail
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        $data['title'] = CreatorHelper::getPageTitle('プロジェクトの詳細');
        $data['assigmentdetails'] = AssignmentService::getInstance()->getListDetailAssginments($assignment);

        return view('creator.projects.assignment')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentDetail  $assignmentDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignmentDetail $assignmentDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignmentDetail  $assignmentDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignmentDetail $assignmentDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentDetail  $assignmentDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentDetail $assignmentDetail)
    {
        //
    }
}
