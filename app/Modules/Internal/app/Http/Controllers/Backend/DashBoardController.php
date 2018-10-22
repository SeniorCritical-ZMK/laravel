<?php

namespace App\Modules\Internal\app\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('internal::backend.dashboard.dashboard');
    }
}