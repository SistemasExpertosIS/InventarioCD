<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransferDRequest;
use App\Http\Requests\UpdateTransferDRequest;
use App\Repositories\TransferDRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Box;
use App\Models\TransferM;

class TransferDController extends AppBaseController
{
    /** @var  TransferDRepository */
    private $transferDRepository;

    public function __construct(TransferDRepository $transferDRepo)
    {
        $this->transferDRepository = $transferDRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the TransferD.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $transferDs = DB::table('transferd as td')
        ->select('td.id', 'td.Quantity as Cantidad', 'c.Description as DescripcionCaja', 'tm.Description as DescripcionTM',
        'pr.Name as Producto')
        ->join('box as c', 'c.Id','=','td.idBox')
        ->join('product as pr', 'pr.Id', '=', 'td.idProduct')
        ->join('transferm as tm', 'tm.Id', '=', 'td.idTransferM')
        ->whereNull('td.deleted_at')
        ->get();
        

        return view('transfer_ds.index')->with('transferDs', $transferDs);
    }

    /**
     * Show the form for creating a new TransferD.
     *
     * @return Response
     */
    public function create()
    {
        $trasladosM = TransferM::pluck('Description','id');
        $cajas = Box::pluck('Description','id');
        $productos = Product::where('State', 1)->pluck('name','id');
        return view('transfer_ds.create', compact('trasladosM', 'cajas', 'productos'));
    }

    public function crear($id)
    {
        $trasladosM = TransferM::where('id', $id)->pluck('Description','id');
        $trasladosM2 = TransferM::find($id);
        $cajas = Box::pluck('Description','id');
        $sucursalEmisora = $trasladosM2->idbranchsends()->get()[0];
        $productos = DB::table('inventory as in')
        ->select('p.Name as name', 'p.id')
        ->join('product as p', 'p.Id','=','in.idProduct')
        ->where('in.idBranch', $sucursalEmisora->id)
        ->whereNull('in.deleted_at')
        ->pluck('name','id');
        return view('transfer_ds.create', compact('trasladosM', 'cajas', 'productos'));
        //return $productos;
    }

    /**
     * Store a newly created TransferD in storage.
     *
     * @param CreateTransferDRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferDRequest $request)
    {
        $input = $request->all();
        //return $input;
        $cantidad = $request->Quantity;
        $idProducto = $request->idProduct;
        $sucursalEmisora = DB::table('transferm as tm')
        ->select('br.id as sucursalEmisoraId')
        ->join('branch as br', 'br.Id', '=', 'tm.idBranchSends')
        ->whereNull('br.deleted_at')
        ->where('tm.id', $request->idTransferM)
        ->first();
        $cantidadInv = DB::table('transferd as td')
        ->select('in.Quantity')
        ->join('product as p', 'p.Id', '=', 'td.idProduct')
        ->join('inventory as in', 'in.idProduct','=','p.id')
        ->whereNull('in.deleted_at')
        ->where('in.idBranch', $sucursalEmisora->sucursalEmisoraId)
        ->first();
        if ($cantidadInv->Quantity < $cantidad) {
            Flash::error('La cantidad del movimiento no puede ser mayor a la existencia de inventario');
            return redirect(route('transferMs.index'));
        }
        else {                       
            $transferD = $this->transferDRepository->create($input);
            Flash::success('El Traslado/Detalle se ha guardado exitosamente.');
            return redirect(route('transferMs.index'));
        }

    }

    /**
     * Display the specified TransferD.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transferD = $this->transferDRepository->findWithoutFail($id);

        if (empty($transferD)) {
            Flash::error('El Traslado/Detalle no se ha encontrado.');

            return redirect(route('transferDs.index'));
        }
        $trasladoM = $transferD->idtransferm()->get()[0];
        $caja = $transferD->idbox()->get()[0];
        $producto = $transferD->idproduct()->get()[0];

        return view('transfer_ds.show', compact('transferD', 'trasladoM', 'caja', 'producto'));
    }

    /**
     * Show the form for editing the specified TransferD.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transferD = $this->transferDRepository->findWithoutFail($id);

        if (empty($transferD)) {
            Flash::error('El Traslado/Detalle no se ha encontrado.');

            return redirect(route('transferDs.index'));
        }
        $trasladosM = TransferM::pluck('Description','id');
        $cajas = Box::pluck('Description','id');
        $productos = Product::where('State', 1)->pluck('name','id');
        return view('transfer_ds.edit', compact('transferD', 'trasladosM', 'cajas', 'productos'));
    }

    /**
     * Update the specified TransferD in storage.
     *
     * @param  int              $id
     * @param UpdateTransferDRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferDRequest $request)
    {
        $transferD = $this->transferDRepository->findWithoutFail($id);

        if (empty($transferD)) {
            Flash::error('El Traslado/Detalle no se ha encontrado.');

            return redirect(route('transferDs.index'));
        }

        $transferD = $this->transferDRepository->update($request->all(), $id);

        Flash::success('El Traslado/Detalle se ha actualizado exitosamente.');

        return redirect(route('transferDs.index'));
    }

    /**
     * Remove the specified TransferD from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transferD = $this->transferDRepository->findWithoutFail($id);

        if (empty($transferD)) {
            Flash::error('El Traslado/Detalle no se ha encontrado.');

            return redirect(route('transferDs.index'));
        }

        $this->transferDRepository->delete($id);

        Flash::success('El Traslado/Detalle se ha eliminado exitosamente.');

        return redirect(route('transferDs.index'));
    }
}
