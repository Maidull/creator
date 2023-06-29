<?php

namespace App\Http\Composers\Creator;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\View;

class CreatorComposer
{
    /**
     * @var Authenticatable|null
     */
    public $creator;

    /**
     * AdminComposer constructor.
     */
    public function __construct()
    {
        $this->creator = auth()->guard('creator')->user();
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $user = $this->creator;
        // $user['avatar'] = FileHelper::getFullUrl($user['avatar']);
        // $view->with('adminLogin', [$user, $data]);
        $view->with('creatorLogin', [$user]);
    }
}
