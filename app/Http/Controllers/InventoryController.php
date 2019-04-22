<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Repositories\InventoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\MovementType;
use App\Models\Product;
use App\Models\Branch;

class InventoryController extends AppBaseController
{
    /** @var  InventoryRepository */
    private $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepo)
    {
        $this->inventoryRepository = $inventoryRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Inventory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        /*$this->inventoryRepository->pushCriteria(new RequestCriteria($request));
        $inventories = $this->inventoryRepository->all();

        return view('inventories.index')->with('inventories', $inventories);*/
        $inventories = DB::table('inventory as in')
        ->select('in.id', 'in.Quantity as Cantidad', 'br.name as Sucursal', 'pr.name as Producto',
        'tmov.Name as TipoMovimiento')
        ->join('branch as br', 'br.Id','=','in.idBranch')
        ->join('product as pr', 'pr.Id', '=', 'in.idProduct')
        ->join('movementtype as tmov', 'tmov.Id', '=', 'in.idMovementType')
        ->whereNull('in.deleted_at')
        ->get();
        //return $inventories;
        return view('inventories.index')->with('inventories', $inventories);
    }

    /**
     * Show the form for creating a new Inventory.
     *
     * @return Response
     */
    public function create()
    {
        $tipoMovimiento = MovementType::pluck('name','id');
        $productos = Product::where('State', 1)->pluck('name','id');
        $sucursales = Branch::pluck('name','id');
        return view('inventories.create',  compact('tipoMovimiento', 'productos', 'sucursales'));
    }

    /**
     * Store a newly created Inventory in storage.
     *
     * @param CreateInventoryRequest $request
     *
     * @return Response
     */
    public function store(CreateInventoryRequest $request)
    {
        $input = $request->all();

        $inventory = $this->inventoryRepository->create($input);

        Flash::success('Inventario guardado exitosamente.');

        return redirect(route('inventories.index'));
    }

    /**
     * Display the specified Inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('inventories.index'));
        }

         $sucursal = $inventory->idBranch()->get()[0];
         return view('inventories.show', compact('inventory', 'sucursal'));
    }

    /**
     * Show the form for editing the specified Inventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('inventories.index'));
        }

        $tipoMovimiento = MovementType::pluck('name','id');
        $productos = Product::where('State', 1)->pluck('name','id');
        $sucursales = Branch::pluck('name','id');
        return view('inventories.edit', compact('inventory','tipoMovimiento', 'productos', 'sucursales'));

    }

    /**
     * Update the specified Inventory in storage.
     *
     * @param  int              $id
     * @param UpdateInventoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInventoryRequest $request)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('inventories.index'));
        }

        $inventory = $this->inventoryRepository->update($request->all(), $id);

        Flash::success('Inventario actualizado exitosamente.');

        return redirect(route('inventories.index'));
    }

    /**
     * Remove the specified Inventory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inventory = $this->inventoryRepository->findWithoutFail($id);

        if (empty($inventory)) {
            Flash::error('Inventario no encontrado.');

            return redirect(route('inventories.index'));
        }

        $this->inventoryRepository->delete($id);

        Flash::success('Inventario eliminado exitosamente.');

        return redirect(route('inventories.index'));
    }
}
