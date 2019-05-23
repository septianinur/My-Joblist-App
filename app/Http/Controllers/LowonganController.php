<?php

namespace App\Http\Controllers;

use App\Lowongan;
use App\Posisi;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowongans = Lowongan::all();
        $posisis = Posisi::all();
        // dd($lowongans);
        return view('lowongans.index')->with('lowongans', $lowongans)->with('posisis', $posisis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posisis = Posisi::all();
        return view('lowongans.create')->with('posisis', $posisis);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Lowongan::create($request->all());
        
        return redirect()->route("lowongan.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lowongan = Lowongan::find($id);
        $posisis = Posisi::all();
        return view('lowongans.edit')->with('lowongan', $lowongan)->with('posisis', $posisis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lowongan = Lowongan::find($id);

        $lowongan->posisi_id            = $request->posisi_id;
        $lowongan->deskripsi            = $request->deskripsi;
        $lowongan->pengalaman_minimal   = $request->pengalaman_minimal;
        $lowongan->pendidikan_minimal   = $request->pendidikan_minimal;
        $lowongan->nilai_minimal        = $request->nilai_minimal;
        $lowongan->deadline             = $request->deadline;
        $lowongan->save();
        return redirect()->route("lowongan.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lowongan::destroy($id);
        return redirect()->route("lowongan.index");
    }
}
