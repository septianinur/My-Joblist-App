<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lowongan;
use App\LowonganUser;
use App\Posisi;
use App\User;
use App\UserDetail;
use App\Role;

class MasterController extends Controller
{

    // public function __construct()
    // {
    //     if(Auth::user()->hasRole('User')){
    //         $user = Auth::user()->user_details;
    //         if (!$user) {
    //             return redirect('user_detail/create');
    //         }
    //     }
    // }
    public function listLowongan()
    {
        $lowongans = Lowongan::all();
        $posisis = Posisi::all();
        // dd($lowongans);
        return view('masters.daftar_lowongan')->with('lowongans', $lowongans)->with('posisis', $posisis);
    }
    
    public function detailLowongan($id)
    {
        $lowongan = Lowongan::find($id);
        $posisis = Posisi::all();
        $lowongan_users = LowonganUser::all();
        
        return view('masters.detail_lowongan')->with('lowongan', $lowongan)->with('posisis', $posisis)->with('lowongan_users', $lowongan_users);
    }
}
