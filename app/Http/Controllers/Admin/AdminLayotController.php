<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserDetailRepo;

class AdminLayotController extends Controller
{
    /**
     * Returns the view for the admin layout.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function AdminLayout()
    {
        return view('admin.page.dashboard.index');
    }

}