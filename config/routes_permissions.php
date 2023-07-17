<?php
//  structure:
//  route => permission (can)
//  route => [permission1, permission2] (canAny)


return array(
    'my_stats.dashboards.index' => 'indexMyStatsDashboards',
    'my_stats.dashboards.create' => 'createMyStatsDashboards',
    'my_stats.dashboards.edit' => 'editMyStatsDashboards',
    'my_stats.dashboards.destroy' => 'destroyMyStatsDashboards',
);
