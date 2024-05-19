<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = DB::table('ventas')->get();
        return json_encode(['ventas' => $ventas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->libro_id = $request->libro_id;
        $venta->cliente_id = $request->cliente_id;
        $venta->cantidad = $request->cantidad;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->total = $request->total;
        $venta->save();
        return json_encode(['venta' => $venta]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);
        return json_encode(['venta' => $venta]);
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
        $venta = Venta::find($id);
        $venta->libro_id = $request->libro_id;
        $venta->cliente_id = $request->cliente_id;
        $venta->cantidad = $request->cantidad;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->total = $request->total;
        $venta->save();
        return json_encode(['venta' => $venta]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);
        $venta->delete();
        $ventas = DB::table('ventas')->get();
        return json_encode(['ventas' => $ventas, 'success' => true]);
    }
}
