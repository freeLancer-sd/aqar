<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePropertyAPIRequest;
use App\Http\Requests\API\UpdatePropertyAPIRequest;
use App\Models\Property;
use App\Notifications\PropertyNotification;
use App\Repositories\PropertyRepository;
use App\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;

use Response;

/**
 * Class PropertyController
 * @package App\Http\Controllers\API
 */
class PropertyAPIController extends AppBaseController
{
    /** @var  PropertyRepository */
    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepo)
    {
        $this->propertyRepository = $propertyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/properties",
     *      summary="Get a listing of the Properties.",
     *      tags={"Property"},
     *      description="Get all Properties",
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
     *                  @SWG\Items(ref="#/definitions/Property")
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
//        return $request->all();
        $keyword['catId'] = +$request->get('catId');
        $keyword['propertyType'] = $request->get('propertyType');
        $keyword['user_id'] = $request->get('user_id');
        if ($keyword['propertyType'] == 'null')
            $keyword['propertyType'] = null;
//        return $keyword;
//        if (!isset($keyword['propertyType']){
        if (!empty($keyword['catId']) && !empty($keyword['user_id'])) {
            return $properties = Property::where('user_id', $keyword['user_id'])
                ->where('property_categorie_id', $keyword['catId'])
                ->orderBy('id', 'DESC')->paginate(40);
        } elseif (!empty($keyword['user_id'])) {
            return $properties = Property::where('user_id', $keyword['user_id'])
                ->orderBy('id', 'DESC')->paginate(40);
        } elseif (!empty($keyword['catId']) && $keyword['propertyType']) {
            return $properties = Property::where('property_categorie_id', $keyword['catId'])
                ->where('property_type', $keyword['propertyType'])
                ->where('status', 3)
                ->orderBy('id', 'DESC')->paginate(40);
        } elseif (!empty($keyword['catId'])) {
            return $properties = Property::where('property_categorie_id', $keyword['catId'])
                ->where('status', 3)
                ->orderBy('id', 'DESC')->paginate(40);
        } else {
            return $properties = $this->propertyRepository->index();
        }
    }

    /**
     * @param CreatePropertyAPIRequest $request
     * @return \Illuminate\Http\JsonResponse|Response
     *
     * @SWG\Post(
     *      path="/properties",
     *      summary="Store a newly created Property in storage",
     *      tags={"Property"},
     *      description="Store Property",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Property that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Property")
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
     *                  ref="#/definitions/Property"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePropertyAPIRequest $request)
    {

        $input = $request->all();
        $property = $this->propertyRepository->create($input);
        return $this->sendResponse(
            $property->toArray(),
            __('lang.messages.saved', ['model' => __('models/properties.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/properties/{id}",
     *      summary="Display the specified Property",
     *      tags={"Property"},
     *      description="Get Property",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Property",
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
     *                  ref="#/definitions/Property"
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
        /** @var Property $property */
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/properties.singular')])
            );
        }

        return $this->sendResponse(
            $property->toArray(),
            __('lang.messages.retrieved', ['model' => __('models/properties.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/properties/user/{id}",
     *      summary="Display Property by user id",
     *      tags={"Property"},
     *      description="Get Property",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of user",
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
     *                  ref="#/definitions/Property"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function user($id)
    {
        /** @var Property $property */
        $property = $this->propertyRepository->user($id);

        if (empty($property)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/properties.singular')])
            );
        }

        return $this->sendResponse(
            $property->toArray(),
            __('lang.messages.retrieved', ['model' => __('models/properties.singular')])
        );
    }


    /**
     * @param int $id
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/properties/{id}",
     *      summary="Update the specified Property in storage",
     *      tags={"Property"},
     *      description="Update Property",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Property",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Property that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Property")
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
     *                  ref="#/definitions/Property"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Property $property */
        $property = $this->propertyRepository->find($id);


        if (empty($property)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/properties.singular')])
            );
        }
        if ($property->user_id === $request->user_id) {

            $property = $this->propertyRepository->update($input, $id);

            return $this->sendResponse(
                $property,
                __('lang.messages.updated', ['model' => __('models/properties.singular')])
            );
        }
    }

    /**
     * @param int $id
     * @return Response
     *
     * @throws Exception
     * @SWG\Delete(
     *      path="/properties/{id}",
     *      summary="Remove the specified Property from storage",
     *      tags={"Property"},
     *      description="Delete Property",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Property",
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
        /** @var Property $property */
        $property = $this->propertyRepository->find($id);

        if (empty($property)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/properties.singular')])
            );
        }

        $property->delete();

        return $this->sendResponse(
            $id,
            __('lang.messages.deleted', ['model' => __('models/properties.singular')])
        );
    }

    public function search(Request $request)
    {
//        return $request->all();
        $property_type = $request->property_type;
        $property_cat = $request->property_categorie_id;
        $price_from = $request->price_from;
        $price_to = $request->price_to;
        $space_from = $request->space_from;
        $space_to = $request->space_to;
        if (!isset($property_type) && !isset($property_cat) && !isset($price_from) && !isset($price_to) && !isset($space_from) && !isset($space_to)) {
//            return 'status: #1';
            return $properties = Property::where('status', '=', 3)
                ->orwherebetween('price', [$price_from, $price_to])
                ->orwherebetween('space', [$space_from, $space_to])
                ->where('property_categorie_id', $property_cat)
                ->where('property_type', $property_type)
                ->paginate(40);
        }
        if (!isset($property_type) && !isset($property_cat) && !isset($price_from) && !isset($price_to)) {
//            return 'status: #2';
            return $properties = Property::where('property_type', $property_type)
                ->where('property_categorie_id', $property_cat)
                ->orwherebetween('price', [$price_from, $price_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }
        if (!isset($property_type) && !isset($property_cat) && !isset($space_from) && !isset($space_to)) {
//            return 'status: #3';
            return $properties = Property::where('property_type', $property_type)
                ->where('property_categorie_id', $property_cat)
                ->orwherebetween('space', [$space_from, $space_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }
        if (!isset($property_type) && !isset($space_from) && !isset($space_to)) {
//            return 'status: #4';
            return $properties = Property::where('property_type', $property_type)
                ->where('property_categorie_id', $property_cat)
                ->orwherebetween('space', [$space_from, $space_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }
        if (!isset($property_type) && !isset($price_from) && !isset($price_to)) {
//            return 'status: #5'
            return $properties = Property::where('property_type', $property_type)
                ->where('property_categorie_id', $property_cat)
                ->orwherebetween('space', [$space_from, $space_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }
        if (isset($property_type)) {
            return $properties = Property::where('property_type', $property_type)
                ->where('status', '=', 3)
                ->paginate(40);
        }

        if (isset($property_type) && isset($property_cat)) {
            return $properties = Property::where('property_type', $property_type)
                ->orWhere('property_categorie_id', $property_cat)
                ->where('status', '=', 3)
                ->paginate(40);
        }

        if (!isset($property_cat) && !isset($space_from) && !isset($space_to) && !isset($price_from) && !isset($price_to)) {
//            return 'status: #7';
            return $properties = Property::where('property_type', $property_type)
                ->where('property_categorie_id', $property_cat)
                ->orwherebetween('space', [$space_from, $space_to])
                ->orwherebetween('price', [$price_from, $price_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }
        if (!isset($property_cat) && !isset($space_from) && !isset($space_to)) {
//            return 'status: #8';
            return $properties = Property::where('property_type', $property_type)
                ->where('property_categorie_id', $property_cat)
                ->orwherebetween('space', [$space_from, $space_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }
        if (!isset($property_cat) && !isset($price_from) && !isset($price_to)) {
//            return 'status: #9';
            return $properties = Property::where('property_categorie_id', $property_cat)
                ->orwherebetween('space', [$space_from, $space_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }


        if (!isset($price_from) && !isset($price_to)) {
//            return 'status: #11';
            return $properties = Property::orwherebetween('price', [$price_from, $price_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }
        if (!isset($space_from) && !isset($space_to)) {
//            return 'status: #12';
            return $properties = Property::
            orwherebetween('space', [$space_from, $space_to])
                ->where('status', '=', 3)
                ->paginate(40);
        }

        return ['data' => 'noData Found', 'status' => false];
    }

    public function filterData(Request $request)
    {
        if ($request->status === 'all') {
            $properties = Property::where('property_type', $request->propertyType)
                ->where('status', '=', 3)
                ->orderBy('id', 'DESC')->paginate(40);
        } else if ($request->status === 'non') {
            $properties = Property::where('property_categorie_id', $request->propertyCategory)
                ->where('property_type', $request->propertyType)
                ->where('status', '=', 3)
                ->orderBy('id', 'DESC')->paginate(40);
        }
        return $properties;
    }
}
