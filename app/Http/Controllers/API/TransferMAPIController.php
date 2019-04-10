<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransferMAPIRequest;
use App\Http\Requests\API\UpdateTransferMAPIRequest;
use App\Models\TransferM;
use App\Repositories\TransferMRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransferMController
 * @package App\Http\Controllers\API
 */

class TransferMAPIController extends AppBaseController
{
    /** @var  TransferMRepository */
    private $transferMRepository;

    public function __construct(TransferMRepository $transferMRepo)
    {
        $this->transferMRepository = $transferMRepo;
    }

    /**
     * Display a listing of the TransferM.
     * GET|HEAD /transferMs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transferMRepository->pushCriteria(new RequestCriteria($request));
        $this->transferMRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transferMs = $this->transferMRepository->all();

        return $this->sendResponse($transferMs->toArray(), 'Transfer Ms retrieved successfully');
    }

    /**
     * Store a newly created TransferM in storage.
     * POST /transferMs
     *
     * @param CreateTransferMAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferMAPIRequest $request)
    {
        $input = $request->all();

        $transferM = $this->transferMRepository->create($input);

        return $this->sendResponse($transferM->toArray(), 'Transfer M saved successfully');
    }

    /**
     * Display the specified TransferM.
     * GET|HEAD /transferMs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransferM $transferM */
        $transferM = $this->transferMRepository->findWithoutFail($id);

        if (empty($transferM)) {
            return $this->sendError('Transfer M not found');
        }

        return $this->sendResponse($transferM->toArray(), 'Transfer M retrieved successfully');
    }

    /**
     * Update the specified TransferM in storage.
     * PUT/PATCH /transferMs/{id}
     *
     * @param  int $id
     * @param UpdateTransferMAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferMAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransferM $transferM */
        $transferM = $this->transferMRepository->findWithoutFail($id);

        if (empty($transferM)) {
            return $this->sendError('Transfer M not found');
        }

        $transferM = $this->transferMRepository->update($input, $id);

        return $this->sendResponse($transferM->toArray(), 'TransferM updated successfully');
    }

    /**
     * Remove the specified TransferM from storage.
     * DELETE /transferMs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransferM $transferM */
        $transferM = $this->transferMRepository->findWithoutFail($id);

        if (empty($transferM)) {
            return $this->sendError('Transfer M not found');
        }

        $transferM->delete();

        return $this->sendResponse($id, 'Transfer M deleted successfully');
    }
}
