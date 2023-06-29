<?php

namespace App\Http\Controllers\Creator;

use App\Helpers\CreatorHelper;
use App\Models\Creator;
use App\Services\Creator\CreatorService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CreatorController extends Controller
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
    public function show(Creator $creator)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function edit(Creator $creator)
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
    public function update(Request $request, Creator $creator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creator $creator)
    {
        //
    }

    public function StoreProfile(Request $request) {
        $creator = Auth::guard('creator')->user();
        $creator->name = $request->name;
        $creator->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/profile_img'),$filename);
            $creator['profile_image'] = $filename;
        }
        $creator->save();

        return redirect()->route('creator.profile');

    }
}
