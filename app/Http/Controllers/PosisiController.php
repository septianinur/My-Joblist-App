<?php

namespace App\Http\Controllers;

use App\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posisis = Posisi::all();
        return view('positions.index')->with('posisis', $posisis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Posisi::create($request->all());
        
        return redirect()->route("posisi.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function show(Posisi $posisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posisi = Posisi::find($id);
        return view('positions.edit')->with('posisi', $posisi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $posisi = Posisi::find($id);

        $posisi->departemen           = $request->departemen;
        $posisi->posisi               = $request->posisi;
        $posisi->save();
        return redirect()->route("posisi.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posisi::destroy($id);
        return redirect()->route("posisi.index");
    }
}
