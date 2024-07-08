<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerWebController extends Controller
{
    public function create(Request $request)
    {
        $user = User::create([
            'role' => "customer",
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        Customer::create([
            "user_id" => $user->id,
            "no_hp" => $request->no_hp,

        ]);
        return redirect('/customer/index');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/customer/index');
    }
}
