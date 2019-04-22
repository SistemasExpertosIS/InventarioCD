<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Box;
class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    //
    /**
     * @return \Illuminate\Http\Resonse
     */
    public function Usuarios(){

        $usuarios= User::where('State',1)->get();
        $pdf = \PDF::loadView('reportes.Usuarios', compact('usuarios'));
      
       return $pdf->stream();
    }
    
    public function totalInventario(){

        $inventarios = DB::table('inventory as in')
        ->select('in.Id','in.Quantity as Cantidad','b.Name as Sucursal', 'p.Name as Producto')
        ->join('branch as b','in.idBranch','=','b.Id')
        ->join('product as p','in.idProduct','=','p.Id')
        ->get();
        $pdf = \PDF::loadView('reportes.totalInventario', compact('inventarios'));
      
       return $pdf->stream();
    }
      public function Productos(){

        $productos= Product::where('State',1)->get();
        $pdf = \PDF::loadView('reportes.Productos', compact('productos'));
      
       return $pdf->stream();
    }

    public function traslados() {
        $traslados = DB::table('transferm as tm')
        ->select('tm.id', 'tm.Description', 'tmv.Name as TipoMovimiento','ur.name as UsuarioReceptor',
        'ue.name as UsuarioEmisor', 'sr.Name as SucursalReceptora', 'se.Name as SucursalEmisora', 
        'tr.Id as Placa', 'td.Quantity as Cantidad', 'b.Id as Caja', 'p.name as Producto')
        ->join('movementtype as tmv', 'tmv.Id', '=', 'tm.idMovementType')
        ->join('users as ur', 'ur.Id','=','tm.idUserReceives')
        ->join('users as ue', 'ue.Id', '=', 'tm.idUserSends')
        ->join('branch as sr', 'sr.Id', '=', 'tm.idBranchReceives')
        ->join('branch as se', 'se.Id', '=', 'tm.idBranchSends')
        ->join('transport as tr', 'tr.Id', '=', 'tm.idTransport')
        ->join('transferd as td', 'td.idTransferM', '=', 'tm.Id')
        ->join('box as b', 'b.Id', '=', 'td.idBox')
        ->join('product as p', 'p.Id', '=', 'td.idProduct')
        ->whereNull('tm.deleted_at')
        ->whereNull('td.deleted_at')
        ->where('td.State', 1)
        ->get();
        $pdf = \PDF::loadView('reportes.traslados', compact('traslados'));
      
        return $pdf->stream();
    }

    public function cajas(){

        $cajas= Box::get();
        $pdf = \PDF::loadView('reportes.cajas', compact('cajas'));
      
       return $pdf->stream();
    }

}
