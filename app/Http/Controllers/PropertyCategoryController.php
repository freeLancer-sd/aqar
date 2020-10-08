<?php

namespace App\Http\Controllers;

use App\DataTables\PropertyCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;
use App\Repositories\PropertyCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PropertyCategoryController extends AppBaseController
{
    /** @var  PropertyCategoryRepository */
    private $propertyCategoryRepository;

    public function __construct(PropertyCategoryRepository $propertyCategoryRepo)
    {
        $this->propertyCategoryRepository = $propertyCategoryRepo;
    }

    /**
     * Display a listing of the PropertyCategory.
     *
     * @param PropertyCategoryDataTable $propertyCategoryDataTable
     * @return Response
     */
    public function index(PropertyCategoryDataTable $propertyCategoryDataTable)
    {
        return $propertyCategoryDataTable->render('property_categories.index');
    }

    /**
     * Show the form for creating a new PropertyCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('property_categories.create');
    }

    /**
     * Store a newly created PropertyCategory in storage.
     *
     * @param CreatePropertyCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreatePropertyCategoryRequest $request)
    {
        $input = $request->all();

        $propertyCategory = $this->propertyCategoryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/propertyCategories.singular')]));

        return redirect(route('propertyCategories.index'));
    }

    /**
     * Display the specified PropertyCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $propertyCategory = $this->propertyCategoryRepository->find($id);

        if (empty($propertyCategory)) {
            Flash::error(__('models/propertyCategories.singular').' '.__('messages.not_found'));

            return redirect(route('propertyCategories.index'));
        }

        return view('property_categories.show')->with('propertyCategory', $propertyCategory);
    }

    /**
     * Show the form for editing the specified PropertyCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $propertyCategory = $this->propertyCategoryRepository->find($id);

        if (empty($propertyCategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propertyCategories.singular')]));

            return redirect(route('propertyCategories.index'));
        }

        return view('property_categories.edit')->with('propertyCategory', $propertyCategory);
    }

    /**
     * Update the specified PropertyCategory in storage.
     *
     * @param  int              $id
     * @param UpdatePropertyCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePropertyCategoryRequest $request)
    {
        $propertyCategory = $this->propertyCategoryRepository->find($id);

        if (empty($propertyCategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propertyCategories.singular')]));

            return redirect(route('propertyCategories.index'));
        }

        $propertyCategory = $this->propertyCategoryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/propertyCategories.singular')]));

        return redirect(route('propertyCategories.index'));
    }

    /**
     * Remove the specified PropertyCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $propertyCategory = $this->propertyCategoryRepository->find($id);

        if (empty($propertyCategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/propertyCategories.singular')]));

            return redirect(route('propertyCategories.index'));
        }

        $this->propertyCategoryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/propertyCategories.singular')]));

        return redirect(route('propertyCategories.index'));
    }
}
