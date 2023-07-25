<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (Auth::user()->role->name == 'patient') {
            return view('dashboard');
        }
        return view('admin.layouts.content');
    }

    public function display()
    {
        $users = User::latest()->where('role_id', '=', 1)->get();
        return view('admin.admin.display', compact('users'));
    }
}
