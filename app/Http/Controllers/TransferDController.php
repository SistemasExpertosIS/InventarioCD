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
        ->select('td.id', 'td.Quantity as Cantidad', 'td.State as Estado', 'c.Description as DescripcionCaja', 'tm.Description as DescripcionTM',
        'pr.Name as Producto')
        ->join('box as c', 'c.Id','=','td.idBox')
        ->join('product as pr', 'pr.Id', '=', 'td.idProduct')
        ->join('transferm as tm', 'tm.Id', '=', 'td.idTransferM')
        ->whereNull('td.deleted_at')
        ->get();
        
        foreach ($transferDs as $transferD) {
            if($transferD->Estado == 1){
                $transferD->Estado = "Activo";
            }else {
                $transferD->Estado = "Inactivo";
            }
        }

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

        $transferD = $this->transferDRepository->create($input);

        Flash::success('El Traslado/Detalle se ha guardado exitosamente.');

        return redirect(route('transferDs.index'));
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
        if($transferD->State == 1){
            $transferD->State = "Activo";
        }else {
            $transferD->State = "Inactivo";
        }

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
