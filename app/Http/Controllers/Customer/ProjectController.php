<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\AdminHelper;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Assignment;

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
        $data['projects'] = Project::where('user_id', auth()->guard('user')->user()->id)->orderByDesc('created_at')->get();

        return view('customer.projects.index')->with(['data' => $data]);
    }
    
    public function show($id)
    {
        $data['title'] = AdminHelper::getPageTitle('プロジェクトの詳細');
        $assignments = Assignment::where('project_id', $id)->get()->groupBy('creator_id')->mapWithKeys(function ($group, $key) {
            return [
                $key =>
                    [
                        'creator_id' => $key,
                        'total_time' => $group->sum('total_time'),
                    ]
            ];
        });

        return view('customer.projects.show', compact('assignments', 'data'));
    }

    public function search(Request $request)
    {
        $data['title'] = AdminHelper::getPageTitle('プロジェクト');
        $month = $request->month;
        $year = $request->year;
        $projects = Project::where('user_id', auth()->guard('user')->user()->id);
        if (!is_null($month) && !is_null($year)) {
            $projects = $projects->whereMonth('created_at', $month)->whereYear('created_at', $year);
        }
        $data['projects'] = $projects->get();

        return view('customer.projects.index')->with(['data' => $data]);
    }
}
