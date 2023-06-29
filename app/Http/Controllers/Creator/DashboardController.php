<?php

namespace App\Http\Controllers\Creator;

use App\Helpers\AdminHelper;
use App\Helpers\CreatorHelper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    /**
     * Dashboard admin
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['title'] = CreatorHelper::getPageTitle('Trang cá nhân');

        return view('creator.index')->with(['data' => $data]);
    }

}
