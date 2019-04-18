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
        $this->transferDRepository->pushCriteria(new RequestCriteria($request));
        $transferDs = $this->transferDRepository->all();

        foreach ($transferDs as $transferD) {
            if($transferD->State == 1){
                $transferD->State = "Activo";
            }else {
                $transferD->State = "Inactivo";
            }
        }

        return view('transfer_ds.index')
            ->with('transferDs', $transferDs);
    }

    /**
     * Show the form for creating a new TransferD.
     *
     * @return Response
     */
    public function create()
    {
        return view('transfer_ds.create');
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

        Flash::success('Transfer D saved successfully.');

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
            Flash::error('Transfer D not found');

            return redirect(route('transferDs.index'));
        }
        if($transferD->State == 1){
            $transferD->State = "Activo";
        }else {
            $transferD->State = "Inactivo";
        }

        return view('transfer_ds.show')->with('transferD', $transferD);
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
            Flash::error('Transfer D not found');

            return redirect(route('transferDs.index'));
        }

        return view('transfer_ds.edit')->with('transferD', $transferD);
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
            Flash::error('Transfer D not found');

            return redirect(route('transferDs.index'));
        }

        $transferD = $this->transferDRepository->update($request->all(), $id);

        Flash::success('Transfer D updated successfully.');

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
            Flash::error('Transfer D not found');

            return redirect(route('transferDs.index'));
        }

        $this->transferDRepository->delete($id);

        Flash::success('Transfer D deleted successfully.');

        return redirect(route('transferDs.index'));
    }
}
