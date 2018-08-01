<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateGeneroRequest;
use App\Http\Requests\Admin\UpdateGeneroRequest;
use App\Repositories\Admin\GeneroRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GeneroController extends AppBaseController
{
    /** @var  GeneroRepository */
    private $generoRepository;

    public function __construct(GeneroRepository $generoRepo)
    {
        $this->generoRepository = $generoRepo;
    }

    /**
     * Display a listing of the Genero.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->generoRepository->pushCriteria(new RequestCriteria($request));
        $generos = $this->generoRepository->all();

        return view('admin.generos.index')
            ->with('generos', $generos);
    }

    /**
     * Show the form for creating a new Genero.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.generos.create');
    }

    /**
     * Store a newly created Genero in storage.
     *
     * @param CreateGeneroRequest $request
     *
     * @return Response
     */
    public function store(CreateGeneroRequest $request)
    {
        $input = $request->all();

        $genero = $this->generoRepository->create($input);

        Flash::success('Genero saved successfully.');

        return redirect(route('admin.generos.index'));
    }

    /**
     * Display the specified Genero.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $genero = $this->generoRepository->findWithoutFail($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('admin.generos.index'));
        }

        return view('admin.generos.show')->with('genero', $genero);
    }

    /**
     * Show the form for editing the specified Genero.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $genero = $this->generoRepository->findWithoutFail($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('admin.generos.index'));
        }

        return view('admin.generos.edit')->with('genero', $genero);
    }

    /**
     * Update the specified Genero in storage.
     *
     * @param  int              $id
     * @param UpdateGeneroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeneroRequest $request)
    {
        $genero = $this->generoRepository->findWithoutFail($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('admin.generos.index'));
        }

        $genero = $this->generoRepository->update($request->all(), $id);

        Flash::success('Genero updated successfully.');

        return redirect(route('admin.generos.index'));
    }

    /**
     * Remove the specified Genero from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $genero = $this->generoRepository->findWithoutFail($id);

        if (empty($genero)) {
            Flash::error('Genero not found');

            return redirect(route('admin.generos.index'));
        }

        $this->generoRepository->delete($id);

        Flash::success('Genero deleted successfully.');

        return redirect(route('admin.generos.index'));
    }
}
