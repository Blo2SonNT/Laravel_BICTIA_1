<?php

namespace App\Http\Controllers;

use App\Models\tb_cubios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TbCubiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cubios'] = tb_cubios::paginate(5);
        return view('cubios.index', $datos);
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

        $campos = [
            'nombre'=>'required|string|max:50',
            'color'=>'required|string',
            'peso'=>'required|numeric',
            'imagen'=>'required|max:10000|mimes:jpg,jpeg,png'
        ];

        $mensajes=[
            'required'=>'El campo :attribute es requirido pupu, diligencielo',
            'imagen.required'=>'Ponga una imagen, bestia, animal, salvaje'
        ];

        $this->validate($request, $campos, $mensajes);

        if($request->hasFile('imagen')){
            $datos_cubios['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }


        tb_cubios::insert($datos_cubios);
        // return response()->json($datos_cubios);
        return redirect('cubios')->with('alerta', 'Se guardo el dato :D');;

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
    public function edit($id)
    {
        $data_cubio = tb_cubios::findOrFail($id);
        return view('cubios.editar', compact('data_cubio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_cubios  $tb_cubios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_update = request()->except("_token", "_method");

        $campos = [
            'nombre'=>'required|string|max:50',
            'color'=>'required|string',
            'peso'=>'required|numeric',
        ];
        $mensajes=[
            'required'=>'El campo :attribute es requirido pupu, diligencielo',
            'imagen.required'=>'Ponga una imagen, bestia, animal, salvaje'
        ];

        if($request->hasFile('imagen')){
            $campos = [
                'imagen'=>'required|max:10000|mimes:jpg,jpeg,png'
            ];
            $mensajes = [
                'imagen.required'=>'La imagen es obligatoria papu lince'
            ];
        }

        $this->validate($request, $campos, $mensajes);


        if($request->hasFile('imagen')){
            $cubio = tb_cubios::findOrFail($id);
            Storage::delete('public/'.$cubio->imagen);

            $data_update['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        tb_cubios::where('id', '=', $id)->update($data_update);
        return redirect('cubios')->with('alerta', 'Se actualizo el dato :D');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_cubios  $tb_cubios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_cubio = tb_cubios::findOrFail($id);
        if(Storage::delete('public/'.$data_cubio->imagen)){
            tb_cubios::destroy($id);
        }
        return redirect('cubios');
    }
}
