<?php

namespace App\Helpers;

class AdminHelper
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
    public static function getAdminSidebar(): array
    {
        return [
            [
                'label' => 'ホームページ',
                'icon' => 'bx bx-home-circle',
                'route' => 'dashboard',
            ],
            [
                'label' => 'プロジェクト',
                'icon' => 'bx bx-file',
                'items' => [
                    [
                        'label' => '管理',
                        'route' => 'projects.index',
                    ],
                    [
                        'label' => '新規作成',
                        'route' => 'projects.create',
                    ],
                    // [
                    //     'label' => 'Phân công dự án',
                    //     'route' => 'projects.assignment',
                    // ],
                ],
            ],
            [
                'label' => 'クライアント',
                'icon' => 'bx bx-group',
                'items' => [
                    [
                        'label' => '管理',
                        'route' => 'users.index',
                    ],
                    [
                        'label' => '新規作成',
                        'route' => 'users.create',
                    ],
                ],
            ],
            [
                'label' => 'クリエイター',
                'icon' => 'bx bx-user-circle',
                'route' => 'creators.index'
            ],
        ];
    }
}
