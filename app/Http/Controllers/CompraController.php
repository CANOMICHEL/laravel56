<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\CompraRequest;
use App\Compra;
use App\CompraDetalle;
use App\proveedor;
use App\Producto;
use DB;
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperamos las compras de la BD
        $compras = DB::select('call usp_listar_compras()');
        return view('compras.index',compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function arrayPaginator($array, $request)
    {
      $page = Input::get('page', 1);
      $perPage = 10;
      $offset = ($page * $perPage) - $perPage;

      return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,['path' => $request->url(), 'query' => $request->query()]);
    }
    public function create()
    {
        //abrimos el formulario
        $proveedores=proveedor::all();
        $productos=Producto::all();
        return view('compras.create',compact('compras','proveedores','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraRequest $request)
    {
        //
        try{
          DB::beginTransaction();
          //guardamos la compra en la BD
            $compra = new Compra();
            $compra->idproveedor=$request->proveedor;
            $compra->estado="REGISTRADO";
            $compra->save();
            //detalles de compra en variables tipo array
            //recuperados de la tabla detalles
            $idproducto=$request->get('idproducto');
            $cantidad=$request->get('cant');
            $precio_unitario=$request->get('precio_unitario');

            $i=0;

            while($i<count($idproducto)){
              $detalle = new CompraDetalle;
              $detalle->idcompra = $compra->idcompra;
              $detalle->idproducto = $idproducto[$i];
              $detalle->cantidad = $cantidad[$i];
              $detalle->precio_unitario = $precio_unitario[$i];
              $detalle->save();
              $i++;
            }
          DB::commit();
        } catch(Exception $e){
            DB::rollBack();
        }

        return redirect()->route('compras.index')
                        ->with('mensaje','La compra fue guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //Recuperamos los detalles de la compra con el id
      $detalles = DB::select( 'call usp_compra_detalle(?)',array($id));
      $totals = DB::select( 'call usp_suma(?)',array($id));
      $proveedores=DB::select('call usp_proveedor(?)',array($id));
      return view('compras.show',compact('detalles','totals','proveedores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompraRequest $request, $id)
    {
      //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $compra = Compra::find($id);
      $compra->estado="ANULADO";
      $compra->save();
      return back()->with('mensaje','¡la compra fue anulada!');
    }
}
