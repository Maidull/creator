<?php

namespace App\Helpers;

class CustomerHelper
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
    public static function getCustomerSidebar(): array
    {
        return [
            [
                'label' => 'プロジェクト',
                'icon' => 'bx bx-file',
                'route' => 'projects',
            ],
        ];
    }
}
