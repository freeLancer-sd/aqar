<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePropertyTypeAPIRequest;
use App\Http\Requests\API\UpdatePropertyTypeAPIRequest;
use App\Models\PropertyType;
use App\Repositories\PropertyTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PropertyTypeController
 * @package App\Http\Controllers\API
 */

class PropertyTypeAPIController extends AppBaseController
{
    /** @var  PropertyTypeRepository */
    private $propertyTypeRepository;

    public function __construct(PropertyTypeRepository $propertyTypeRepo)
    {
        $this->propertyTypeRepository = $propertyTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyTypes",
     *      summary="Get a listing of the PropertyTypes.",
     *      tags={"PropertyType"},
     *      description="Get all PropertyTypes",
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
     *                  @SWG\Items(ref="#/definitions/PropertyType")
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
        $propertyTypes = $this->propertyTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $propertyTypes->toArray(),
            __('messages.retrieved', ['model' => __('models/propertyTypes.plural')])
        );
    }

    /**
     * @param CreatePropertyTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/propertyTypes",
     *      summary="Store a newly created PropertyType in storage",
     *      tags={"PropertyType"},
     *      description="Store PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PropertyType")
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
     *                  ref="#/definitions/PropertyType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePropertyTypeAPIRequest $request)
    {
        $input = $request->all();

        $propertyType = $this->propertyTypeRepository->create($input);

        return $this->sendResponse(
            $propertyType->toArray(),
            __('messages.saved', ['model' => __('models/propertyTypes.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/propertyTypes/{id}",
     *      summary="Display the specified PropertyType",
     *      tags={"PropertyType"},
     *      description="Get PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyType",
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
     *                  ref="#/definitions/PropertyType"
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
        /** @var PropertyType $propertyType */
        $propertyType = $this->propertyTypeRepository->find($id);

        if (empty($propertyType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/propertyTypes.singular')])
            );
        }

        return $this->sendResponse(
            $propertyType->toArray(),
            __('messages.retrieved', ['model' => __('models/propertyTypes.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdatePropertyTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/propertyTypes/{id}",
     *      summary="Update the specified PropertyType in storage",
     *      tags={"PropertyType"},
     *      description="Update PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PropertyType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PropertyType")
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
     *                  ref="#/definitions/PropertyType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePropertyTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var PropertyType $propertyType */
        $propertyType = $this->propertyTypeRepository->find($id);

        if (empty($propertyType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/propertyTypes.singular')])
            );
        }

        $propertyType = $this->propertyTypeRepository->update($input, $id);

        return $this->sendResponse(
            $propertyType->toArray(),
            __('messages.updated', ['model' => __('models/propertyTypes.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/propertyTypes/{id}",
     *      summary="Remove the specified PropertyType from storage",
     *      tags={"PropertyType"},
     *      description="Delete PropertyType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PropertyType",
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
        /** @var PropertyType $propertyType */
        $propertyType = $this->propertyTypeRepository->find($id);

        if (empty($propertyType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/propertyTypes.singular')])
            );
        }

        $propertyType->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/propertyTypes.singular')])
        );
    }
}
