<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Repositories\BranchRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;

class BranchController extends AppBaseController
{
    /** @var  BranchRepository */
    private $branchRepository;

    public function __construct(BranchRepository $branchRepo)
    {
        $this->branchRepository = $branchRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Branch.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /*Hace un Join entre las tablas branch y users para obtener el nombre del usuario
        asignado a cada sucursal y poder mostrarlo, en lugar de mostrar solamente el idUser
        que se guarda en la tabla branch*/
        $branches = DB::table('users as us')
        ->select('b.id', 'b.Name', 'b.City', 'b.Abv', 'us.name as Usuario')
        ->whereNull('b.deleted_at')
        ->join('branch as b','us.Id','=','b.idUser')->get();
        return view('branches.index', compact('branches'));//Retorna la info a la vista

    }

    /**
     * Show the form for creating a new Branch.
     *
     * @return Response
     */
    public function create()
    {
        /*Obtiene todos los usuarios que estén activos y los retorna al create del branch,
        de esta forma el cliente puede ver el nombre del usuario que está asignando a cada branch,
        en lugar de tener que ingresar manualmente el id de dicho usuario*/
        $usuarios = User::where('State', 1)->pluck('name','id');
        return view('branches.create')->with('usuarios', $usuarios);
    }

    /**
     * Store a newly created Branch in storage.
     *
     * @param CreateBranchRequest $request
     *
     * @return Response
     */
    public function store(CreateBranchRequest $request)
    {
        $input = $request->all();

        $branch = $this->branchRepository->create($input);

        Flash::success('Branch saved successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Display the specified Branch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }
        /*Obtiene el usuario que está asignado a esa determinada sucursal y lo retorna
        a la vista show para que el cliente pueda ver el nombre del usuario asignado a esa
        sucursal, en vez de mirar solamente su id*/
        $usuario = $branch->iduser()->get()[0];
        return view('branches.show', compact('branch', 'usuario'));
    }

    /**
     * Show the form for editing the specified Branch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }
        //Misma lógica del create
        $usuarios = User::where('State', 1)->pluck('name','id');
        return view('branches.edit', compact('usuarios', 'branch'));
    }

    /**
     * Update the specified Branch in storage.
     *
     * @param  int              $id
     * @param UpdateBranchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBranchRequest $request)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $branch = $this->branchRepository->update($request->all(), $id);

        Flash::success('Branch updated successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified Branch from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $branch = $this->branchRepository->findWithoutFail($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $this->branchRepository->delete($id);

        Flash::success('Branch deleted successfully.');

        return redirect(route('branches.index'));
    }
}
