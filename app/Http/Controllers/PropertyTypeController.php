<?php

namespace App\Http\Controllers;

use App\DataTables\PropertyTypeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use App\Repositories\PropertyTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PropertyTypeController extends AppBaseController
{
    /** @var  PropertyTypeRepository */
    private $propertyTypeRepository;

    public function __construct(PropertyTypeRepository $propertyTypeRepo)
    {
        $this->propertyTypeRepository = $propertyTypeRepo;
    }

    /**
     * Display a listing of the PropertyType.
     *
     * @param PropertyTypeDataTable $propertyTypeDataTable
     * @return Response
     */
    public function index(PropertyTypeDataTable $propertyTypeDataTable)
    {
        return $propertyTypeDataTable->render('property_types.index');
    }

    /**
     * Show the form for creating a new PropertyType.
     *
     * @return Response
     */
    public function create()
    {
        return view('property_types.create');
    }

    /**
     * Store a newly created PropertyType in storage.
     *
     * @param CreatePropertyTypeRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyTypeRequest $request)
    {
        $input = $request->all();

        $propertyType = $this->propertyTypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/propertyTypes.singular')]));

        return redirect(route('propertyTypes.index'));
    }

    /**
     * Display the specified PropertyType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyType = $this->propertyTypeRepository->find($id);

        if (empty($propertyType)) {
            Flash::error(__('models/propertyTypes.singular').' '.__('messages.not_found'));

            return redirect(route('propertyTypes.index'));
        }

        return view('property_types.show')->with('propertyType', $propertyType);
    }

    /**
     * Show the form for editing the specified PropertyType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyType = $this->propertyTypeRepository->find($id);

        if (empty($propertyType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propertyTypes.singular')]));

            return redirect(route('propertyTypes.index'));
        }

        return view('property_types.edit')->with('propertyType', $propertyType);
    }

    /**
     * Update the specified PropertyType in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyTypeRequest $request)
    {
        $propertyType = $this->propertyTypeRepository->find($id);

        if (empty($propertyType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propertyTypes.singular')]));

            return redirect(route('propertyTypes.index'));
        }

        $propertyType = $this->propertyTypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/propertyTypes.singular')]));

        return redirect(route('propertyTypes.index'));
    }

    /**
     * Remove the specified PropertyType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyType = $this->propertyTypeRepository->find($id);

        if (empty($propertyType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propertyTypes.singular')]));

            return redirect(route('propertyTypes.index'));
        }

        $this->propertyTypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/propertyTypes.singular')]));

        return redirect(route('propertyTypes.index'));
    }
}
