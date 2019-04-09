<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMovementTypeAPIRequest;
use App\Http\Requests\API\UpdateMovementTypeAPIRequest;
use App\Models\MovementType;
use App\Repositories\MovementTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MovementTypeController
 * @package App\Http\Controllers\API
 */

class MovementTypeAPIController extends AppBaseController
{
    /** @var  MovementTypeRepository */
    private $movementTypeRepository;

    public function __construct(MovementTypeRepository $movementTypeRepo)
    {
        $this->movementTypeRepository = $movementTypeRepo;
    }

    /**
     * Display a listing of the MovementType.
     * GET|HEAD /movementTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->movementTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->movementTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $movementTypes = $this->movementTypeRepository->all();

        return $this->sendResponse($movementTypes->toArray(), 'Movement Types retrieved successfully');
    }

    /**
     * Store a newly created MovementType in storage.
     * POST /movementTypes
     *
     * @param CreateMovementTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMovementTypeAPIRequest $request)
    {
        $input = $request->all();

        $movementType = $this->movementTypeRepository->create($input);

        return $this->sendResponse($movementType->toArray(), 'Movement Type saved successfully');
    }

    /**
     * Display the specified MovementType.
     * GET|HEAD /movementTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MovementType $movementType */
        $movementType = $this->movementTypeRepository->findWithoutFail($id);

        if (empty($movementType)) {
            return $this->sendError('Movement Type not found');
        }

        return $this->sendResponse($movementType->toArray(), 'Movement Type retrieved successfully');
    }

    /**
     * Update the specified MovementType in storage.
     * PUT/PATCH /movementTypes/{id}
     *
     * @param  int $id
     * @param UpdateMovementTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMovementTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var MovementType $movementType */
        $movementType = $this->movementTypeRepository->findWithoutFail($id);

        if (empty($movementType)) {
            return $this->sendError('Movement Type not found');
        }

        $movementType = $this->movementTypeRepository->update($input, $id);

        return $this->sendResponse($movementType->toArray(), 'MovementType updated successfully');
    }

    /**
     * Remove the specified MovementType from storage.
     * DELETE /movementTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MovementType $movementType */
        $movementType = $this->movementTypeRepository->findWithoutFail($id);

        if (empty($movementType)) {
            return $this->sendError('Movement Type not found');
        }

        $movementType->delete();

        return $this->sendResponse($id, 'Movement Type deleted successfully');
    }
}
