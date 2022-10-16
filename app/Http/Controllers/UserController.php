<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function detail()
    {
        $user = Keuangan::all();
        return view('user.detail', compact('user'));
    }
}
