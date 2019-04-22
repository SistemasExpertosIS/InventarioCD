<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use App\Models\Box;
use Illuminate\Support\Facades\Auth;
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
        $usuarioRegistrado = Auth::user();
        $pdf = \PDF::loadView('reportes.Usuarios', compact('usuarios', 'usuarioRegistrado'));
      
       return $pdf->stream();
    }
    
    public function totalInventario(){

        $usuarioRegistrado = Auth::user();
        $inventarios = DB::table('inventory as in')
        ->select('in.Id','in.Quantity as Cantidad','b.Name as Sucursal', 'p.Name as Producto')
        ->join('branch as b','in.idBranch','=','b.Id')
        ->join('product as p','in.idProduct','=','p.Id')
        ->get();
        $pdf = \PDF::loadView('reportes.totalInventario', compact('inventarios', 'usuarioRegistrado'));
      
       return $pdf->stream();
    }
      public function Productos(){

        $usuarioRegistrado = Auth::user();
        $productos= Product::where('State',1)->get();
        $pdf = \PDF::loadView('reportes.Productos', compact('productos', 'usuarioRegistrado'));
      
       return $pdf->stream();
    }

    public function traslados() {
        $usuarioRegistrado = Auth::user();
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
        $pdf = \PDF::loadView('reportes.traslados', compact('traslados', 'usuarioRegistrado'));
      
        return $pdf->stream();
    }

    public function cajas(){
        $usuarioRegistrado = Auth::user();
        $cajas= Box::get();
        $pdf = \PDF::loadView('reportes.cajas', compact('cajas', 'usuarioRegistrado'));
      
       return $pdf->stream();
    }

    public function sucursales() {
        $usuarioRegistrado = Auth::user();
        $sucursales = DB::table('users as us')
        ->select('b.id', 'b.Name', 'b.City', 'b.Abv', 'us.name as Usuario')
        ->whereNull('b.deleted_at')
        ->join('branch as b','us.Id','=','b.idUser')->get();

        $pdf = \PDF::loadView('reportes.sucursales', compact('sucursales', 'usuarioRegistrado'));
      
        return $pdf->stream();
    }

}
