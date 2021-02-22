<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json($users);
    }

    public function byName($name) {
        return User::where('name', $name)->get();
    }
}
