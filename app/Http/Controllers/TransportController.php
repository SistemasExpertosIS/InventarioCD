<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransportRequest;
use App\Http\Requests\UpdateTransportRequest;
use App\Repositories\TransportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransportController extends AppBaseController
{
    /** @var  TransportRepository */
    private $transportRepository;

    public function __construct(TransportRepository $transportRepo)
    {
        $this->transportRepository = $transportRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Transport.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transportRepository->pushCriteria(new RequestCriteria($request));
        $transports = $this->transportRepository->all();

        return view('transports.index')
            ->with('transports', $transports);
    }

    /**
     * Show the form for creating a new Transport.
     *
     * @return Response
     */
    public function create()
    {
        return view('transports.create');
    }

    /**
     * Store a newly created Transport in storage.
     *
     * @param CreateTransportRequest $request
     *
     * @return Response
     */
    public function store(CreateTransportRequest $request)
    {
        $input = $request->all();

        $transport = $this->transportRepository->create($input);

        Flash::success('Transporte guardado exitosamente.');

        return redirect(route('transports.index'));
    }

    /**
     * Display the specified Transport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transport = $this->transportRepository->findWithoutFail($id);

        if (empty($transport)) {
            Flash::error('Transporte no encontrado.');

            return redirect(route('transports.index'));
        }

        return view('transports.show')->with('transport', $transport);
    }

    /**
     * Show the form for editing the specified Transport.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transport = $this->transportRepository->findWithoutFail($id);

        if (empty($transport)) {
            Flash::error('Transporte no encontrado.');

            return redirect(route('transports.index'));
        }

        return view('transports.edit')->with('transport', $transport);
    }

    /**
     * Update the specified Transport in storage.
     *
     * @param  int              $id
     * @param UpdateTransportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransportRequest $request)
    {
        $transport = $this->transportRepository->findWithoutFail($id);

        if (empty($transport)) {
            Flash::error('Transporte no encontrado.');

            return redirect(route('transports.index'));
        }

        $transport = $this->transportRepository->update($request->all(), $id);

        Flash::success('Transporte actualizado exitosamente.');

        return redirect(route('transports.index'));
    }

    /**
     * Remove the specified Transport from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transport = $this->transportRepository->findWithoutFail($id);

        if (empty($transport)) {
            Flash::error('Transporte no encontrado.');

            return redirect(route('transports.index'));
        }

        $this->transportRepository->delete($id);

        Flash::success('Transporte eliminado exitosamente.');

        return redirect(route('transports.index'));
    }
}
