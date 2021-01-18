<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::latest()->get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function getUser($id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    public function createUser(Request $request)
    {
        #Fill User Model
        $user = new User;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->genre = $request->genre;
        $user->born_date = $request->born_date;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->url_profile_picture = $request->url_profile_picture;

        $user->save();

        return response()->json([
            "message" => "User created successfully"
        ], 201);
    }

    public function updateUser(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->genre = $request->genre;
            $user->born_date = $request->born_date;
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;
            $user->url_profile_picture = $request->url_profile_picture;
            $user->save();

            return response()->json([
                "message" => "User updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Book not found"
            ], 404);
        }
    }

    public function deleteUser($id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "User deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

}
