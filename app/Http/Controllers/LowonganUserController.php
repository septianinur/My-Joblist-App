<?php

namespace App\Http\Controllers;

use App\LowonganUser;
use App\Lowongan;
use App\Posisi;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongan = Lowongan::all();
        $posisi = Posisi::all();
        $lowongan_user = LowonganUser::all();
        $user = User::all();
        $user_detail = UserDetail::all();

        return view('lowongan_users.index')->with('lowongans', $lowongan)->with('posisis', $posisi)->with('lowongan_users', $lowongan_user)->with('users', $user)->with('user_details', $user_detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $lowongan       = Lowongan::find($id);
        $user_id        = Auth::user()->id;
        $lowongan_user  = new LowonganUser;

        $lowongan_user->lowongan_id = $id;
        $lowongan_user->user_id = $user_id;
        $lowongan_user->status_cv = 'Unread';
        $lowongan_user->save();

        return redirect()->route('detail_lowongan', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LowonganUser  $lowonganUser
     * @return \Illuminate\Http\Response
     */
    public function show(LowonganUser $lowonganUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LowonganUser  $lowonganUser
     * @return \Illuminate\Http\Response
     */
    public function edit(LowonganUser $lowonganUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LowonganUser  $lowonganUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lowongan_user = LowonganUser::find($id);
        $lowongan_user->status_cv = $request->status_cv;
        $lowongan_user->save();
        
        return redirect()->route('lowongan_user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LowonganUser  $lowonganUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(LowonganUser $lowonganUser)
    {
        //
    }

}
