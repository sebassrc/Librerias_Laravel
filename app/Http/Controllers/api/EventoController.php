<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = DB::table('eventos')->get();
        return json_encode(['eventos' => $eventos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->libro_id = $request->libro_id;
        $evento->save();
        return json_encode(['evento' => $evento]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return json_encode(['evento' => $evento]);
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
        $evento = Evento::find($id);
        $evento->nombre = $request->nombre;
        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->libro_id = $request->libro_id;
        $evento->save();
        return json_encode(['evento' => $evento]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id);
        $evento->delete();
        $eventos = DB::table('eventos')->get();
        return json_encode(['eventos' => $eventos, 'success' => true]);
    }
}
