<?php

namespace App\Helpers;

class UserHelper
{
    /**
     *  Get page title
     *
     * @param null $title
     * @return string|null
     */
    public static function getPageTitle($title = null): ?string
    {
        if (!$title) {
            return config('app.name');
        }//end if

        return $title . ' - ' . config('app.name');
    }

    /**
     * Get admin sidebar
     *
     * @return array
     */
    public static function getUserSidebar(): array
    {
        return [
            [
                'label' => trans('admin.sidebar.dashboard'),
                'icon' => 'bx bx-home-circle',
                'route' => 'dashboard',
            ],
            [
                'label' => 'プロジェクト',
                'icon' => 'bx bx-file',
                'route' => 'route.index'
            ],
        ];
    }
}
