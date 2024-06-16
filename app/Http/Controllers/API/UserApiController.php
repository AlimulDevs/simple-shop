<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function registerCustomer(Request $request)
    {
        $user = User::create([
            'role' => "customer",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Customer::create([
            "user_id" => $user->id,
            "no_hp" => $request->no_hp,

        ]);

        return response()->json(["message" => "Success Create Account Customer",]);
    }
    public function registerAdmin(Request $request)
    {
        $user = User::create([
            'role' => "admin",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        return response()->json(["message" => "Success Create Account Admin",]);
    }



    public function profile()
    {
        try {

            $user = User::where("id", auth()->user()->id)->with("guru")->with("siswa.kelas")->first();
            return [
                'isSuccess' => true,
                'message' => 'Success Get Profile',
                'data' => $user
            ];
        } catch (\Throwable $th) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'Failed Register',
                'error' => $th
            ], 500);
        }
    }
    public function editProfile(Request $request)
    {
        $user = User::where("id",  auth()->user()->id)->update([
            "email" => $request->email,
            "name" => $request->name,

        ]);





        return response()->json([
            'isSuccess' => true,
            "message" => "Success Update Profile",
        ]);
    }



    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->with("customer")->first();

        if ($user == null) {
            return response()->json(["message" => "Failed Login, Email Not Found"]);
        }

        if (Hash::check($request->password, $user->password)) {
            $getUser = User::where('email', $request['email'])->firstOrFail();
            $token = $getUser->createToken('auth_token')->plainTextToken;

            User::where("id", $getUser->id)->update([
                "remember_token" => $token
            ]);
            return response()->json([
                "message" => "Success Login Account",
                "token" => $token,
                "data" => $user
            ]);
        } else {
            return response()->json(["message" => "Failed Login, Wrong Password"]);
        }
    }
}
