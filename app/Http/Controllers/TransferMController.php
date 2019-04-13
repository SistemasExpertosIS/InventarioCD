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
        $this->transferMRepository->pushCriteria(new RequestCriteria($request));
        $transferMs = $this->transferMRepository->all();

        return view('transfer_ms.index')
            ->with('transferMs', $transferMs);
    }

    /**
     * Show the form for creating a new TransferM.
     *
     * @return Response
     */
    public function create()
    {
        return view('transfer_ms.create');
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

        Flash::success('Transfer M saved successfully.');

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
            Flash::error('Transfer M not found');

            return redirect(route('transferMs.index'));
        }

        return view('transfer_ms.show')->with('transferM', $transferM);
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
            Flash::error('Transfer M not found');

            return redirect(route('transferMs.index'));
        }

        return view('transfer_ms.edit')->with('transferM', $transferM);
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
            Flash::error('Transfer M not found');

            return redirect(route('transferMs.index'));
        }

        $transferM = $this->transferMRepository->update($request->all(), $id);

        Flash::success('Transfer M updated successfully.');

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
            Flash::error('Transfer M not found');

            return redirect(route('transferMs.index'));
        }

        $this->transferMRepository->delete($id);

        Flash::success('Transfer M deleted successfully.');

        return redirect(route('transferMs.index'));
    }
}
