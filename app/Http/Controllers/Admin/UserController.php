<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
    public function show($id){
        $users = User::query()
        ->select('users.*')
        ->findOrFail($id);
        return view('admin.users.show',compact('users'));
    }
}
