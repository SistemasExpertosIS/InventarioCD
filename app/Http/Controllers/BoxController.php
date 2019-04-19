<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use App\Repositories\BoxRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BoxController extends AppBaseController
{
    /** @var  BoxRepository */
    private $boxRepository;

    public function __construct(BoxRepository $boxRepo)
    {
        $this->boxRepository = $boxRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Box.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->boxRepository->pushCriteria(new RequestCriteria($request));
        $boxes = $this->boxRepository->all();

        return view('boxes.index')
            ->with('boxes', $boxes);
    }

    /**
     * Show the form for creating a new Box.
     *
     * @return Response
     */
    public function create()
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created Box in storage.
     *
     * @param CreateBoxRequest $request
     *
     * @return Response
     */
    public function store(CreateBoxRequest $request)
    {
        $input = $request->all();

        $box = $this->boxRepository->create($input);

        Flash::success('Caja guardada exitosamente');

        return redirect(route('boxes.index'));
    }

    /**
     * Display the specified Box.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $box = $this->boxRepository->findWithoutFail($id);

        if (empty($box)) {
            Flash::error('Caja no encontrada.');

            return redirect(route('boxes.index'));
        }

        return view('boxes.show')->with('box', $box);
    }

    /**
     * Show the form for editing the specified Box.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $box = $this->boxRepository->findWithoutFail($id);

        if (empty($box)) {
            Flash::error('Caja no encontrada.');

            return redirect(route('boxes.index'));
        }

        return view('boxes.edit')->with('box', $box);
    }

    /**
     * Update the specified Box in storage.
     *
     * @param  int              $id
     * @param UpdateBoxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBoxRequest $request)
    {
        $box = $this->boxRepository->findWithoutFail($id);

        if (empty($box)) {
            Flash::error('Caja no encontrada.');

            return redirect(route('boxes.index'));
        }

        $box = $this->boxRepository->update($request->all(), $id);

        Flash::success('Caja actualizada exitosamente.');

        return redirect(route('boxes.index'));
    }

    /**
     * Remove the specified Box from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $box = $this->boxRepository->findWithoutFail($id);

        if (empty($box)) {
            Flash::error('Caja no encontrada.');

            return redirect(route('boxes.index'));
        }

        $this->boxRepository->delete($id);

        Flash::success('Caja eliminada exitosamente.');

        return redirect(route('boxes.index'));
    }
}
