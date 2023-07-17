<?php

$checkPermissions = [
    'indexMyStatsDashboards',
    'editMyStatsSettings',
    'destroyMyStatsDashboards',
    'createMyStatsDashboards',
];

return [
    [
        'after' => 'Dashboard',
        'entry' => [
            'My Stats Dashboards' => array(
                'can' => $checkPermissions,
                'icon' => 'fa fa-clone',
                'subcategories' => array(
                    0 => array(
                        'title' => 'Dashboards',
                        'can' => $checkPermissions,
                        'items' => array(
                            0 => array(
                                // translated with key
                                'title_lng' => 'my_stats::dashboards.create',
                                'can' => 'createMyStatsDashboards',
                                'route' => 'my_stats.dashboards.create',
                            ),
                            2 => array(
                                // direct, without translation
                                'title' => 'Manage Dashboards',
                                'can' => $checkPermissions,
                                'route' => 'my_stats.dashboards.index',
                                'matching_routes' => ['my_stats.dashboards.edit']
                            ),
                        ),
                    ),
                )
            ),
        ],
    ],
];