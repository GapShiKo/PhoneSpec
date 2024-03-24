<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    public function isAdmin(User $user)
    {
       $flag = DB::table('admin_users')->where('name', $user->name)->exists();
       return $flag;
    }
    public function show()
    {
        if ($this->isAdmin(Auth::user())) {
            return view('admin.main');
         } else return redirect()->back();
    }
    public function showPanel()
    {
        if ($this->isAdmin(Auth::user())) {
            $users = User::all();
            return view('admin.panel', compact('users'));
        } else return redirect()->back();
    }
}
