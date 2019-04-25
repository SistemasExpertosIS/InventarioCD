<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransferMRequest;
use App\Http\Requests\UpdateTransferMRequest;
use App\Repositories\TransferMRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\MovementType;
use App\Models\User;
use App\Models\Branch;
use App\Models\Transport;
use Illuminate\Support\Facades\Auth;

class TransferMController extends AppBaseController
{
    /** @var  TransferMRepository */
    private $transferMRepository;

    public function __construct(TransferMRepository $transferMRepo)
    {
        $this->transferMRepository = $transferMRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the TransferM.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $usuarioRegistrado = Auth::user();
        $transferMs = DB::table('transferm as tm')
        ->select('tm.id', 'tm.Description', 'tm.State', 'ue.name as UsuarioEmisor',
        'sr.Name as SucursalReceptora', 'se.Name as SucursalEmisora', 
        'tmv.Name as TipoMovimiento')
        ->join('users as ur', 'ur.Id','=','tm.idUserReceives')
        ->join('users as ue', 'ue.Id', '=', 'tm.idUserSends')
        ->join('branch as sr', 'sr.Id', '=', 'tm.idBranchReceives')
        ->join('branch as se', 'se.Id', '=', 'tm.idBranchSends')
        ->join('movementtype as tmv', 'tmv.Id', '=', 'tm.idMovementType')
        ->whereNull('tm.deleted_at')
        ->get();
        return view('transfer_ms.index', compact('transferMs', 'usuarioRegistrado'));
    }

    /**
     * Show the form for creating a new TransferM.
     *
     * @return Response
     */
    public function create()
    {
        $tipoMovimiento = MovementType::pluck('name','id');
        $usuarios = User::where('State', 1)->pluck('name','id');
        $sucursales = Branch::pluck('name','id');
        $transportes = Transport::pluck('plate','id');
        return view('transfer_ms.create', compact('tipoMovimiento','usuarios',
                                                'sucursales', 'transportes'));
    }

    /**
     * Store a newly created TransferM in storage.
     *
     * @param CreateTransferMRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferMRequest $request)
    {
        $input = $request->all();

        $transferM = $this->transferMRepository->create($input);

        Flash::success('El Traslado/Movimiento se ha guardado exitosamente.');

        return redirect(route('transferMs.index'));
    }

    /**
     * Display the specified TransferM.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transferM = $this->transferMRepository->findWithoutFail($id);

        if (empty($transferM)) {
            Flash::error('El Traslado/Movimiento no se ha encontrado.');

            return redirect(route('transferMs.index'));
        }
        $tipoMovimiento = $transferM->idmovementtype()->get()[0];
        $usuarioReceptor = $transferM->iduserreceives()->get()[0];
        $usuarioEmisor = $transferM->idusersends()->get()[0];
        $sucursalReceptora = $transferM->idbranchreceives()->get()[0];
        $sucursalEmisora = $transferM->idbranchsends()->get()[0];
        $transporte = $transferM->idtransport()->get()[0];

        return view('transfer_ms.show', compact('transferM', 'tipoMovimiento', 'usuarioReceptor',
                                                'usuarioEmisor', 'sucursalReceptora',
                                                'sucursalEmisora', 'transporte'));
    }

    /**
     * Show the form for editing the specified TransferM.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transferM = $this->transferMRepository->findWithoutFail($id);

        if (empty($transferM)) {
            Flash::error('El Traslado/Movimiento no se ha encontrado.');

            return redirect(route('transferMs.index'));
        }
        $tipoMovimiento = MovementType::pluck('name','id');
        $usuarios = User::where('State', 1)->pluck('name','id');
        $sucursales = Branch::pluck('name','id');
        $transportes = Transport::pluck('plate','id');
        return view('transfer_ms.edit', compact('transferM', 'tipoMovimiento','usuarios',
                                                'sucursales', 'transportes'));
    }

    /**
     * Update the specified TransferM in storage.
     *
     * @param  int              $id
     * @param UpdateTransferMRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferMRequest $request)
    {
        $transferM = $this->transferMRepository->findWithoutFail($id);

        if (empty($transferM)) {
            Flash::error('El Traslado/Movimiento no se ha encontrado.');

            return redirect(route('transferMs.index'));
        }

        $transferM = $this->transferMRepository->update($request->all(), $id);

        Flash::success('El Traslado/Movimiento se ha modificado exitosamente.');

        return redirect(route('transferMs.index'));
    }

    /**
     * Remove the specified TransferM from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transferM = $this->transferMRepository->findWithoutFail($id);

        if (empty($transferM)) {
            Flash::error('El Traslado/Movimiento no se ha encontrado.');

            return redirect(route('transferMs.index'));
        }

        $this->transferMRepository->delete($id);

        Flash::success('El Traslado/Movimiento se ha eliminado exitosamente.');

        return redirect(route('transferMs.index'));
    }
}
