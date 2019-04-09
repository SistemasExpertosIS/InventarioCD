<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBoxAPIRequest;
use App\Http\Requests\API\UpdateBoxAPIRequest;
use App\Models\Box;
use App\Repositories\BoxRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BoxController
 * @package App\Http\Controllers\API
 */

class BoxAPIController extends AppBaseController
{
    /** @var  BoxRepository */
    private $boxRepository;

    public function __construct(BoxRepository $boxRepo)
    {
        $this->boxRepository = $boxRepo;
    }

    /**
     * Display a listing of the Box.
     * GET|HEAD /boxes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->boxRepository->pushCriteria(new RequestCriteria($request));
        $this->boxRepository->pushCriteria(new LimitOffsetCriteria($request));
        $boxes = $this->boxRepository->all();

        return $this->sendResponse($boxes->toArray(), 'Boxes retrieved successfully');
    }

    /**
     * Store a newly created Box in storage.
     * POST /boxes
     *
     * @param CreateBoxAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBoxAPIRequest $request)
    {
        $input = $request->all();

        $box = $this->boxRepository->create($input);

        return $this->sendResponse($box->toArray(), 'Box saved successfully');
    }

    /**
     * Display the specified Box.
     * GET|HEAD /boxes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Box $box */
        $box = $this->boxRepository->findWithoutFail($id);

        if (empty($box)) {
            return $this->sendError('Box not found');
        }

        return $this->sendResponse($box->toArray(), 'Box retrieved successfully');
    }

    /**
     * Update the specified Box in storage.
     * PUT/PATCH /boxes/{id}
     *
     * @param  int $id
     * @param UpdateBoxAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBoxAPIRequest $request)
    {
        $input = $request->all();

        /** @var Box $box */
        $box = $this->boxRepository->findWithoutFail($id);

        if (empty($box)) {
            return $this->sendError('Box not found');
        }

        $box = $this->boxRepository->update($input, $id);

        return $this->sendResponse($box->toArray(), 'Box updated successfully');
    }

    /**
     * Remove the specified Box from storage.
     * DELETE /boxes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Box $box */
        $box = $this->boxRepository->findWithoutFail($id);

        if (empty($box)) {
            return $this->sendError('Box not found');
        }

        $box->delete();

        return $this->sendResponse($id, 'Box deleted successfully');
    }
}
