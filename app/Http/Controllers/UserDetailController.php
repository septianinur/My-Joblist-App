<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\User;
use App\Posisi;
use App\LowonganUser;
use App\Lowongan;
use Illuminate\Http\Request;
use Session, Redirect, Validator, File;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->user_details;

        if (!$user) {
            return redirect('user_detail/create');
        } else {
            $id = Auth::user()->id;
            $lowongan = Lowongan::all();
            $posisi = Posisi::all();
            $lowongan_user = LowonganUser::all();
            $user = User::find($id);
            $user_detail = Auth::user()->user_details()->get();
            
            // dd($user_detail);
            return view('users.index')->with('user_detail', $user_detail)->with('lowongans', $lowongan)->with('posisis', $posisi)->with('lowongan_users', $lowongan_user)->with('users', $user);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'pas_foto'  => 'required|image|mimes:jpeg,png|min:1|max:10000',
            'cv_path'  => 'required|mimes:pdf|min:1|max:1000000',
        ]);
        
        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()->with('errors', $validation->errors() );
        }
        $user_detail = new UserDetail;

        // upload the image //
        $pas_foto = $request->file('pas_foto');
        $pas_foto_destination = 'uploads/pas_foto/';
        $pas_foto_filename = str_random(6).'_'.$pas_foto->getClientOriginalName();
        $pas_foto->move($pas_foto_destination, $pas_foto_filename);

        // upload the pdf //
        $cv = $request->file('cv_path');
        $cv_destination = 'uploads/cv/';
        $cv_filename = str_random(6).'_'.$cv->getClientOriginalName();
        $cv->move($cv_destination, $cv_filename);

        // save image data into database //
        $user_detail->pas_foto              = $pas_foto_destination.$pas_foto_filename;
        $user_detail->cv_path               = $cv_destination.$cv_filename;
        $user_detail->nik                   = $request->nik;
        $user_detail->jenis_kelamin         = $request->jenis_kelamin;
        $user_detail->alamat                = $request->alamat;
        $user_detail->no_telp               = $request->no_telp;
        $user_detail->tempat_lahir          = $request->tempat_lahir;
        $user_detail->pendidikan_terakhir   = $request->pendidikan_terakhir;
        $user_detail->nilai                 = $request->nilai;
        $user_detail->user_id               = $request->user_id;
        $user_detail->save();
        
        return redirect()->route("user_detail.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $user = UserDetail::find($id);
        return view('users.edit')->with('user_detail', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user_detail = UserDetail::find($id);

        // if user choose an image, replace the old one //
        if( $request->hasFile('pas_foto') ){
            $validation = Validator::make($request->all(), [
                'pas_foto'  => 'required|image|mimes:jpeg,png|min:1|max:10000',
            ]);
             // Check if it fails //
            if( $validation->fails() ){
                return redirect()->back()->withInput()->with('errors', $validation->errors() );
            }
            File::delete($user_detail->pas_foto);
            $pas_foto = $request->file('pas_foto');
            $pas_foto_destination = 'uploads/pas_foto/';
            $pas_foto_filename = str_random(6).'_'.$pas_foto->getClientOriginalName();
            $pas_foto->move($pas_foto_destination, $pas_foto_filename);
        }
        
        // if user choose an pdf, replace the old one //
        if( $request->hasFile('cv_path') ){
            $validation = Validator::make($request->all(), [
                'cv_path'  => 'required|mimes:pdf|min:1|max:1000000',
            ]);
             // Check if it fails //
            if( $validation->fails() ){
                return redirect()->back()->withInput()->with('errors', $validation->errors() );
            }
            File::delete($user_detail->cv_path);
            $cv = $request->file('cv_path');
            $cv_destination = 'uploads/cv/';
            $cv_filename = str_random(6).'_'.$cv->getClientOriginalName();
            $cv->move($cv_destination, $cv_filename);
        }

        // save image data into database //
        $user_detail->nik                   = $request->nik;
        $user_detail->jenis_kelamin         = $request->jenis_kelamin;
        $user_detail->alamat                = $request->alamat;
        $user_detail->no_telp               = $request->no_telp;
        $user_detail->tempat_lahir          = $request->tempat_lahir;
        $user_detail->pendidikan_terakhir   = $request->pendidikan_terakhir;
        $user_detail->nilai                 = $request->nilai;
        $user_detail->user_id               = $request->user_id;
        $user_detail->save();
        
        return redirect()->route("user_detail.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserDetail::destroy($id);
        return redirect()->route("user_detail.index");
    }
}
