<?php

namespace App\Http\Controllers;

// use App\Http\Resources\UsersResource;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // get all users
    public function index(Request $request)
    {
        $users = User::all();
        if (is_null($users)) {
            $payload = [
                'success'    =>    false,
                'response'  => 'No users in List!'
            ];
            return response()->json($payload, 404);
        }
        $payload = [
            'success'    =>    true,
            'response'  => $users
        ];
        return response()->json($payload, 200);
    }

    // store user
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($user->save()) {
            $payload = [
                'success'    =>    true,
                'response'  => 'User Added Successfully!'
            ];
            return response()->json($payload, 200);
        }
        $payload = [
            'success'    =>    false,
            'response'  => 'Failed to add User!'
        ];
        return response()->json($payload, 404);
    }

    // user info
    public function show(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if (is_null($user)) {
            $payload = [
                'success'    =>    false,
                'response'  => 'User Not Found!'
            ];
            return response()->json($payload, 404);
        }
        $payload = [
            'success'    =>    true,
            'response'  => $user
        ];
        return response()->json($payload, 200);
    }

    // update user
    public function update(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if (is_null($user)) {
            $payload = [
                'success'    =>    false,
                'response'  => 'User Not Found!'
            ];
            return response()->json($payload, 404);
        }
        $user->update();
        $payload = [
            'success'    =>    true,
            'response'  => 'User Updated Successfully!'
        ];
        return response()->json($payload, 200);
    }

    // destroy user
    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        if (is_null($user)) {
            $payload = [
                'success'    =>    false,
                'response'  => 'User Not found!'
            ];
            return response()->json($payload, 404);
        }
        $user->delete();
        $payload = [
            'success'    =>    true,
            'response'  => 'User Deleted Successfully!'
        ];
        return response()->json($payload, 200);
    }
}
