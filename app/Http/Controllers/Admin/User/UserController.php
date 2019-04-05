<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Auth\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function edit($id)
    {
        $user = Admin::find($id)->toArray();
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $input = $request->input();
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required|max:15',
            'email' => 'required|max:255'
        ]);

//        $data = ['email' => $input['email'], 'name' => $input['name'],];

        $user = Admin::find($input['id']);

        if($input['password']) {
            $user->password =  Hash::make($input['password']);
        }

        $user->email = $input['email'];
        $user->name = $input['name'];

        $user->save();

        return view('admin.user.edit', ['user' => $user])->with(['message' => 'success']);
    }
}
