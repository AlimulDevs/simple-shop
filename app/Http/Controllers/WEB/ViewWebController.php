<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewWebController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }
    public function berandaView()
    {
        return view('beranda.index');
    }
}
