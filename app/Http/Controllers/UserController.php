<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function indexHTML()
    {
        $users = $this->index();
        return view('user', ["users" => $users]);
    }

    public function byName($name)
    {
        return User::where('name', $name)->get();
    }

    public function post(Request $request)
    {
        if ($request->filled('action')) {
            if ($request->input('action') == 'edit') {
                $user = User::where('email', $request->input('email'))->update($request->only(['name', 'surname']));
                
                return $this->indexHTML();
            } else if ($request->input('action') == 'delete') {
                $user = User::where('email', $request->input('email'))->delete();

                return $this->indexHTML();
            }
        }
        return $request->all();
    }
}
