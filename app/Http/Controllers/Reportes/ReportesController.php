<?php

namespace App\Http\Controllers\Reportes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
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

}
