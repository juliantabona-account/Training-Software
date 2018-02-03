<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Role;

class AdminController extends Controller
{

    public function show($admin_id)
    {
        $admin = User::find($admin_id);

        return view('admin.show', compact('admin'));
    }

}
