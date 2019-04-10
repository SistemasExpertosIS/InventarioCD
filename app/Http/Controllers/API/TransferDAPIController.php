<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransferDAPIRequest;
use App\Http\Requests\API\UpdateTransferDAPIRequest;
use App\Models\TransferD;
use App\Repositories\TransferDRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransferDController
 * @package App\Http\Controllers\API
 */

class TransferDAPIController extends AppBaseController
{
    /** @var  TransferDRepository */
    private $transferDRepository;

    public function __construct(TransferDRepository $transferDRepo)
    {
        $this->transferDRepository = $transferDRepo;
    }

    /**
     * Display a listing of the TransferD.
     * GET|HEAD /transferDs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transferDRepository->pushCriteria(new RequestCriteria($request));
        $this->transferDRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transferDs = $this->transferDRepository->all();

        return $this->sendResponse($transferDs->toArray(), 'Transfer Ds retrieved successfully');
    }

    /**
     * Store a newly created TransferD in storage.
     * POST /transferDs
     *
     * @param CreateTransferDAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransferDAPIRequest $request)
    {
        $input = $request->all();

        $transferD = $this->transferDRepository->create($input);

        return $this->sendResponse($transferD->toArray(), 'Transfer D saved successfully');
    }

    /**
     * Display the specified TransferD.
     * GET|HEAD /transferDs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransferD $transferD */
        $transferD = $this->transferDRepository->findWithoutFail($id);

        if (empty($transferD)) {
            return $this->sendError('Transfer D not found');
        }

        return $this->sendResponse($transferD->toArray(), 'Transfer D retrieved successfully');
    }

    /**
     * Update the specified TransferD in storage.
     * PUT/PATCH /transferDs/{id}
     *
     * @param  int $id
     * @param UpdateTransferDAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransferDAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransferD $transferD */
        $transferD = $this->transferDRepository->findWithoutFail($id);

        if (empty($transferD)) {
            return $this->sendError('Transfer D not found');
        }

        $transferD = $this->transferDRepository->update($input, $id);

        return $this->sendResponse($transferD->toArray(), 'TransferD updated successfully');
    }

    /**
     * Remove the specified TransferD from storage.
     * DELETE /transferDs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransferD $transferD */
        $transferD = $this->transferDRepository->findWithoutFail($id);

        if (empty($transferD)) {
            return $this->sendError('Transfer D not found');
        }

        $transferD->delete();

        return $this->sendResponse($id, 'Transfer D deleted successfully');
    }
}
