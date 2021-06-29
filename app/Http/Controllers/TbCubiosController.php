<?php

namespace App\Http\Controllers;

use App\Models\tb_cubios;
use Illuminate\Http\Request;

class TbCubiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cubios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $datos_cubios = request()->all();
        $datos_cubios = request()->except("_token");

        if($request->hasFile('imagen')){
            $datos_cubios['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }


        tb_cubios::insert($datos_cubios);
        return response()->json($datos_cubios);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_cubios  $tb_cubios
     * @return \Illuminate\Http\Response
     */
    public function show(tb_cubios $tb_cubios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_cubios  $tb_cubios
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_cubios $tb_cubios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_cubios  $tb_cubios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_cubios $tb_cubios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_cubios  $tb_cubios
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_cubios $tb_cubios)
    {
        //
    }
}
