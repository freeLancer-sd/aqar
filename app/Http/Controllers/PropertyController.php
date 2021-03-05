<?php

namespace App\Http\Controllers;

use App\DataTables\PropertyDataTable;
use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Repositories\PropertyRepository;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Response;

class PropertyController extends AppBaseController
{
    /** @var  PropertyRepository */
    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepo)
    {
        $this->propertyRepository = $propertyRepo;
    }

    /**
     * Display a listing of the Property.
     *
     * @param PropertyDataTable $propertyDataTable
     * @return Response
     */
    public function index(PropertyDataTable $propertyDataTable)
    {
        return $propertyDataTable->render('properties.index');
    }

    /**
     * Show the form for creating a new Property.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create(Request $request)
    {
        $cat = PropertyCategory::all()->pluck('title', 'id');
        $property = new Property();
        $property->fill($request->old());
        return view('properties.create', compact('cat', 'property'));
    }

    /**
     * Store a newly created Property in storage.
     *
     * @param CreatePropertyRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyRequest $request)
    {
        $this->propertyRepository->new_create($request);

        Flash::success(__('lang.messages.saved', ['model' => __('models/properties.singular')]));

        return redirect(route('properties.index'));
    }

    /**
     * Display the specified Property.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error(__('models/properties.singular') . ' ' . __('lang.messages.not_found'));

            return redirect(route('properties.index'));
        }

        return view('properties.show')->with('property', $property);
    }

    /**
     * Show the form for editing the specified Property.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error(__('lang.messages.not_found', ['model' => __('models/properties.singular')]));

            return redirect(route('properties.index'));
        }

        $cat = PropertyCategory::all()->pluck('title', 'id');
        return view('properties.edit')->with('property', $property)->with('cat', $cat);
    }

    /**
     * Update the specified Property in storage.
     *
     * @param int $id
     * @param UpdatePropertyRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdatePropertyRequest $request)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error(__('lang.messages.not_found', ['model' => __('models/properties.singular')]));

            return redirect(route('properties.index'));
        }

        $property = $this->propertyRepository->new_update($request, $id);

        Flash::success(__('lang.messages.updated', ['model' => __('models/properties.singular')]));

        return redirect(route('properties.index'));
    }

    /**
     * Remove the specified Property from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            Flash::error(__('lang.messages.not_found', ['model' => __('models/properties.singular')]));

            return redirect(route('properties.index'));
        }

        $this->propertyRepository->delete($id);

        Flash::success(__('lang.messages.deleted', ['model' => __('models/properties.singular')]));

        return redirect(route('properties.index'));
    }

}
