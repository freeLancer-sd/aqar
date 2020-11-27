<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePropertyCategoryAPIRequest;
use App\Http\Requests\API\UpdatePropertyCategoryAPIRequest;
use App\Models\PropertyCategory;
use App\Repositories\PropertyCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PropertyCategoryController
 * @package App\Http\Controllers\API
 */
class PropertyCategoryAPIController extends AppBaseController
{
    /** @var  PropertyCategoryRepository */
    private $propertyCategoryRepository;

    public function __construct(PropertyCategoryRepository $propertyCategoryRepo)
    {
        $this->propertyCategoryRepository = $propertyCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyCategories",
     *      summary="Get a listing of the PropertyCategories.",
     *      tags={"PropertyCategory"},
     *      description="Get all PropertyCategories",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/property_categories")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $propertyCategories = $this->propertyCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $propertyCategories->toArray(),
            __('messages.retrieved', ['model' => __('models/propertyCategories.plural')])
        );
    }

    /**
     * @param CreatePropertyCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/propertyCategories",
     *      summary="Store a newly created PropertyCategory in storage",
     *      tags={"PropertyCategory"},
     *      description="Store PropertyCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/property_categories")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/property_categories"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePropertyCategoryAPIRequest $request)
    {
        $input = $request->all();

        $propertyCategory = $this->propertyCategoryRepository->create($input);

        return $this->sendResponse(
            $propertyCategory->toArray(),
            __('messages.saved', ['model' => __('models/propertyCategories.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyCategories/{id}",
     *      summary="Display the specified PropertyCategory",
     *      tags={"PropertyCategory"},
     *      description="Get PropertyCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/property_categories"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var PropertyCategory $propertyCategory */
        $propertyCategory = $this->propertyCategoryRepository->find($id);

        if (empty($propertyCategory)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/propertyCategories.singular')])
            );
        }

        return $this->sendResponse(
            $propertyCategory->toArray(),
            __('messages.retrieved', ['model' => __('models/propertyCategories.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdatePropertyCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/propertyCategories/{id}",
     *      summary="Update the specified PropertyCategory in storage",
     *      tags={"PropertyCategory"},
     *      description="Update PropertyCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/property_categories")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/property_categories"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePropertyCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var PropertyCategory $propertyCategory */
        $propertyCategory = $this->propertyCategoryRepository->find($id);

        if (empty($propertyCategory)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/propertyCategories.singular')])
            );
        }

        $propertyCategory = $this->propertyCategoryRepository->update($input, $id);

        return $this->sendResponse(
            $propertyCategory->toArray(),
            __('messages.updated', ['model' => __('models/propertyCategories.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/propertyCategories/{id}",
     *      summary="Remove the specified PropertyCategory from storage",
     *      tags={"PropertyCategory"},
     *      description="Delete PropertyCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var PropertyCategory $propertyCategory */
        $propertyCategory = $this->propertyCategoryRepository->find($id);

        if (empty($propertyCategory)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/propertyCategories.singular')])
            );
        }

        $propertyCategory->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/propertyCategories.singular')])
        );
    }
}
