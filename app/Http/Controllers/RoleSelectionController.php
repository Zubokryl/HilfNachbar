<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleSelectionController extends Controller
{
    public function showRoleSelection()
    {
        return view('role_selection');
    }
}