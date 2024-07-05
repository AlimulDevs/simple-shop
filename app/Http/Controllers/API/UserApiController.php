<?php

namespace App\Http\Controllers\API;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Seller;
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
    public function registerSeller(Request $request)
    {
        $user = User::create([
            'role' => "seller",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Seller::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'address' => $request->address,
        ]);

        return response()->json(["message" => "Success Create Account Seller",]);
    }



    public function profile()
    {
        try {

            $user = User::where("id", auth()->user()->id)->with(["customer", "seller"])->first();
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
    public function editProfileCustomer(Request $request)
    {
        $user = User::where("id",  auth()->user()->id)->update([
            "email" => $request->email,
            "name" => $request->name,

        ]);


        Customer::where("user_id", auth()->user()->id)->update([
            "no_hp" => $request->no_hp,
            "address" => $request->address,
        ]);


        return response()->json([
            'isSuccess' => true,
            "message" => "Success Update Profile",
        ]);
    }
    public function editProfileSeller(Request $request)
    {
        $user = User::where("id",  auth()->user()->id)->update([
            "name" => $request->name,

        ]);

        Seller::where("user_id", auth()->user()->id)->update([
            "description" => $request->description,
            "address" => $request->address,
        ]);





        return response()->json([
            'isSuccess' => true,
            "message" => "Success Update Profile Seller",
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


    public function editPhotoProfile(Request $request)
    {

        $data_user = User::where("id",  auth()->user()->id)->first();

        if ($data_user->photo_profile_url !== null) {
            DeleteFile::delete($data_user->photo_profile_url);
        }

        $photo_profile_url = UploadFile::upload("foto_profile", $request->file("photo_profile_url"));

        $user = User::where("id",  auth()->user()->id)->update([
            "photo_profile_url" => $photo_profile_url,


        ]);

        return response()->json([
            'isSuccess' => true,
            "message" => "Success Update Photo Profile",
        ]);
    }

    public function tes(Request $request)
    {
        $data = $request->name;
        return response()->json([
            'isSuccess' => true,
            "message" => "Success Update Photo Profile",
            "data" => $data
        ]);
    }
}
