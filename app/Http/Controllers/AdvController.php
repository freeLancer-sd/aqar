<?php

namespace App\Http\Controllers;

use App\DataTables\AdvDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAdvRequest;
use App\Http\Requests\UpdateAdvRequest;
use App\Repositories\AdvRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AdvController extends AppBaseController
{
    /** @var  AdvRepository */
    private $advRepository;

    public function __construct(AdvRepository $advRepo)
    {
        $this->advRepository = $advRepo;
    }

    /**
     * Display a listing of the Adv.
     *
     * @param AdvDataTable $advDataTable
     * @return Response
     */
    public function index(AdvDataTable $advDataTable)
    {
        return $advDataTable->render('advs.index');
    }

    /**
     * Show the form for creating a new Adv.
     *
     * @return Response
     */
    public function create()
    {
        return view('advs.create');
    }

    /**
     * Store a newly created Adv in storage.
     *
     * @param CreateAdvRequest $request
     *
     * @return Response
     */
    public function store(CreateAdvRequest $request)
    {
         $adv = $this->advRepository->new_create($request);

        Flash::success(__('lang.messages.saved', ['model' => __('models/advs.singular')]));

        return redirect(route('advs.index'));
    }

    /**
     * Display the specified Adv.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $adv = $this->advRepository->find($id);

        if (empty($adv)) {
            Flash::error(__('models/advs.singular') . ' ' . __('lang.messages.not_found'));

            return redirect(route('advs.index'));
        }

        return view('advs.show')->with('adv', $adv);
    }

    /**
     * Show the form for editing the specified Adv.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $adv = $this->advRepository->find($id);

        if (empty($adv)) {
            Flash::error(__('lang.messages.not_found', ['model' => __('models/advs.singular')]));

            return redirect(route('advs.index'));
        }

        return view('advs.edit')->with('adv', $adv);
    }

    /**
     * Update the specified Adv in storage.
     *
     * @param int $id
     * @param UpdateAdvRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdvRequest $request)
    {
        $adv = $this->advRepository->find($id);

        if (empty($adv)) {
            Flash::error(__('lang.messages.not_found', ['model' => __('models/advs.singular')]));

            return redirect(route('advs.index'));
        }

        $adv = $this->advRepository->update($request->all(), $id);

        Flash::success(__('lang.messages.updated', ['model' => __('models/advs.singular')]));

        return redirect(route('advs.index'));
    }

    /**
     * Remove the specified Adv from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $adv = $this->advRepository->find($id);

        if (empty($adv)) {
            Flash::error(__('lang.messages.not_found', ['model' => __('models/advs.singular')]));

            return redirect(route('advs.index'));
        }

        $this->advRepository->delete($id);

        Flash::success(__('lang.messages.deleted', ['model' => __('models/advs.singular')]));

        return redirect(route('advs.index'));
    }
}
