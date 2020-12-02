<?php

namespace App\Http\Controllers;

use App\DataTables\DistrictDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;
use App\Models\City;
use App\Repositories\DistrictRepository;
use Flash;
use Response;

class DistrictController extends AppBaseController
{
    /** @var  DistrictRepository */
    private $districtRepository;

    public function __construct(DistrictRepository $districtRepo)
    {
        $this->districtRepository = $districtRepo;
    }

    /**
     * Display a listing of the District.
     *
     * @param DistrictDataTable $districtDataTable
     * @return Response
     */
    public function index(DistrictDataTable $districtDataTable)
    {
        return $districtDataTable->render('districts.index');
    }

    /**
     * Show the form for creating a new District.
     *
     * @return Response
     */
    public function create()
    {
        $city = City::all()->pluck('name', 'id');
        return view('districts.create', compact('city'));
    }

    /**
     * Store a newly created District in storage.
     *
     * @param CreateDistrictRequest $request
     *
     * @return Response
     */
    public function store(CreateDistrictRequest $request)
    {
        $input = $request->all();

        $district = $this->districtRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/districts.singular')]));

        return redirect(route('districts.index'));
    }

    /**
     * Display the specified District.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $district = $this->districtRepository->find($id);

        if (empty($district)) {
            Flash::error(__('models/districts.singular') . ' ' . __('messages.not_found'));

            return redirect(route('districts.index'));
        }

        return view('districts.show')->with('district', $district);
    }

    /**
     * Show the form for editing the specified District.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $district = $this->districtRepository->find($id);
        $city = City::all()->pluck('name', 'id');
        if (empty($district)) {
            Flash::error(__('messages.not_found', ['model' => __('models/districts.singular')]));

            return redirect(route('districts.index'));
        }

        return view('districts.edit')->with('district', $district)->with('city', $city);
    }

    /**
     * Update the specified District in storage.
     *
     * @param int $id
     * @param UpdateDistrictRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistrictRequest $request)
    {
        $district = $this->districtRepository->find($id);

        if (empty($district)) {
            Flash::error(__('messages.not_found', ['model' => __('models/districts.singular')]));

            return redirect(route('districts.index'));
        }

        $district = $this->districtRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/districts.singular')]));

        return redirect(route('districts.index'));
    }

    /**
     * Remove the specified District from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $district = $this->districtRepository->find($id);

        if (empty($district)) {
            Flash::error(__('messages.not_found', ['model' => __('models/districts.singular')]));

            return redirect(route('districts.index'));
        }

        $this->districtRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/districts.singular')]));

        return redirect(route('districts.index'));
    }
}
