<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
                $array = $request->only(['name', 'surname']);
                if ($request->filled('password')) {
                    $array = array_merge($array, ['password' => Hash::make($request->input('password'))]);
                }
                $user = User::where('email', $request->input('email'))->update($array);
                
                return $this->indexHTML();
            } else if ($request->input('action') == 'delete') {
                $user = User::where('email', $request->input('email'))->delete();

                return $this->indexHTML();
            } else if ($request->input('action') == 'add') {
                $array = $request->only(['name', 'surname', 'email', 'password']);
                $array['password'] = Hash::make($array['password']);
                $user = User::create($array);

                return $this->indexHTML();
            }
        }
        return $request->all();
    }
}
