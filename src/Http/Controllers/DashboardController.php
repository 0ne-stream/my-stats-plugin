<?php

namespace Acme\MyStats\Http\Controllers;

use App\Http\Controllers\Controller;
use Acme\MyStats\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        return view('my_stats::pages.dashboards.index');
    }

    public function create()
    {
        throw new \Exception('Not implemented');
    }

    public function edit(Dashboard $dashboard)
    {
        throw new \Exception('Not implemented');
    }

    public function destroy(Dashboard $dashboard)
    {
        throw new \Exception('Not implemented');
    }
}
