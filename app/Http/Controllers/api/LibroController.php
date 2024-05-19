<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = DB::table('libros')->get();
        return json_encode(['libros' => $libros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->isbn = $request->isbn;
        $libro->precio = $request->precio;
        $libro->stock = $request->stock;
        $libro->categoria_id = $request->categoria_id;
        $libro->save();
        return json_encode(['libro' => $libro]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);
        return json_encode(['libro' => $libro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->isbn = $request->isbn;
        $libro->precio = $request->precio;
        $libro->stock = $request->stock;
        $libro->categoria_id = $request->categoria_id;
        $libro->save();
        return json_encode(['libro' => $libro]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        $libros = DB::table('libros')->get();
        return json_encode(['libros' => $libros, 'success' => true]);
    }
}
