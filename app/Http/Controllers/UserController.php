<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
        {
            $users = User::all();
            $data = compact('users');
            return view("user.index")->with($data);
        }
    public function make_admin(User $user)
        {
            $user->update([
                "role" => 'admin'
            ]);
            session()->flash("success","User updated successfully.");
            return redirect(route("user.index"));
        } 
    public function edit(User $user)
        {
            $data = compact('user');
            return view('user.edit')->with($data);
        } 
    public function update(UserUpdateRequest $request, User $user)
        {
            $user->update([
                "name" => $request->name,
                "about" => $request->about
            ]);
            session()->flash("success","Profile updated successfully");
            return redirect(route('user.index'));
        }          
}
