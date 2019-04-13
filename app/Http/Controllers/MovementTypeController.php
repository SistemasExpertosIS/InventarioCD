<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovementTypeRequest;
use App\Http\Requests\UpdateMovementTypeRequest;
use App\Repositories\MovementTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MovementTypeController extends AppBaseController
{
    /** @var  MovementTypeRepository */
    private $movementTypeRepository;

    public function __construct(MovementTypeRepository $movementTypeRepo)
    {
        $this->movementTypeRepository = $movementTypeRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the MovementType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->movementTypeRepository->pushCriteria(new RequestCriteria($request));
        $movementTypes = $this->movementTypeRepository->all();

        return view('movement_types.index')
            ->with('movementTypes', $movementTypes);
    }

    /**
     * Show the form for creating a new MovementType.
     *
     * @return Response
     */
    public function create()
    {
        return view('movement_types.create');
    }

    /**
     * Store a newly created MovementType in storage.
     *
     * @param CreateMovementTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateMovementTypeRequest $request)
    {
        $input = $request->all();

        $movementType = $this->movementTypeRepository->create($input);

        Flash::success('Movement Type saved successfully.');

        return redirect(route('movementTypes.index'));
    }

    /**
     * Display the specified MovementType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movementType = $this->movementTypeRepository->findWithoutFail($id);

        if (empty($movementType)) {
            Flash::error('Movement Type not found');

            return redirect(route('movementTypes.index'));
        }

        return view('movement_types.show')->with('movementType', $movementType);
    }

    /**
     * Show the form for editing the specified MovementType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movementType = $this->movementTypeRepository->findWithoutFail($id);

        if (empty($movementType)) {
            Flash::error('Movement Type not found');

            return redirect(route('movementTypes.index'));
        }

        return view('movement_types.edit')->with('movementType', $movementType);
    }

    /**
     * Update the specified MovementType in storage.
     *
     * @param  int              $id
     * @param UpdateMovementTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMovementTypeRequest $request)
    {
        $movementType = $this->movementTypeRepository->findWithoutFail($id);

        if (empty($movementType)) {
            Flash::error('Movement Type not found');

            return redirect(route('movementTypes.index'));
        }

        $movementType = $this->movementTypeRepository->update($request->all(), $id);

        Flash::success('Movement Type updated successfully.');

        return redirect(route('movementTypes.index'));
    }

    /**
     * Remove the specified MovementType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $movementType = $this->movementTypeRepository->findWithoutFail($id);

        if (empty($movementType)) {
            Flash::error('Movement Type not found');

            return redirect(route('movementTypes.index'));
        }

        $this->movementTypeRepository->delete($id);

        Flash::success('Movement Type deleted successfully.');

        return redirect(route('movementTypes.index'));
    }
}
