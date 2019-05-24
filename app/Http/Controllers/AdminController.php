<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserDetail;
use App\Lowongan;
use App\LowonganUser;
use App\Posisi;

class AdminController extends Controller
{
    public function listUser()
    {
        $user = User::where('id', '<>',Auth::user()->id)->get();
        $user_detail = UserDetail::all();
        return view('masters.daftar_user')->with('users', $user)->with('user_details', $user_detail);
    }

    public function index()
    {
        $lowongan = Lowongan::all();
        $posisi = Posisi::all();
        $lowongan_user = LowonganUser::all();
        $user = User::all();
        $user_detail = UserDetail::all();

        return view('lowongan_users.dashboard_admin')->with('lowongans', $lowongan)->with('posisis', $posisi)->with('lowongan_users', $lowongan_user)->with('users', $user)->with('user_details', $user_detail);
    }
}
