<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
       return view('users.admin.homepage');
    }

    public function userIndex() {
        $users = User::all();

        return view('users.admin.userIndex')->with(['users' => $users]);
}

    public function desk() {
        return view('users.admin.desk');
    }

}
