<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDistrictAPIRequest;
use App\Http\Requests\API\UpdateDistrictAPIRequest;
use App\Models\City;
use App\Models\District;
use App\Repositories\DistrictRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DistrictController
 * @package App\Http\Controllers\API
 */
class DistrictAPIController extends AppBaseController
{
    /** @var  DistrictRepository */
    private $districtRepository;

    public function __construct(DistrictRepository $districtRepo)
    {
        $this->districtRepository = $districtRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/districts",
     *      summary="Get a listing of the Districts.",
     *      tags={"District"},
     *      description="Get all Districts",
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
     *                  @SWG\Items(ref="#/definitions/District")
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
        $districts = $this->districtRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $districts->toArray(),
            __('messages.retrieved', ['model' => __('models/districts.plural')])
        );
    }

    /**
     * @param CreateDistrictAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/districts",
     *      summary="Store a newly created District in storage",
     *      tags={"District"},
     *      description="Store District",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="District that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/District")
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
     *                  ref="#/definitions/District"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDistrictAPIRequest $request)
    {
        $input = $request->all();

        $district = $this->districtRepository->create($input);

        return $this->sendResponse(
            $district->toArray(),
            __('messages.saved', ['model' => __('models/districts.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/districts/{id}",
     *      summary="Display the specified District",
     *      tags={"District"},
     *      description="Get District",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of District",
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
     *                  ref="#/definitions/District"
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
        /** @var District $district */
        $district = $this->districtRepository->find($id);

        if (empty($district)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/districts.singular')])
            );
        }

        return $this->sendResponse(
            $district->toArray(),
            __('messages.retrieved', ['model' => __('models/districts.singular')])
        );
    }

    public function byCity($city)
    {
        /** @var District $district */
        $district = District::where('city_id', $city)->with('city')->first();

        if (empty($district)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/districts.singular')])
            );
        }

        return $this->sendResponse(
            $district->toArray(),
            __('messages.retrieved', ['model' => __('models/districts.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateDistrictAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/districts/{id}",
     *      summary="Update the specified District in storage",
     *      tags={"District"},
     *      description="Update District",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of District",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="District that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/District")
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
     *                  ref="#/definitions/District"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDistrictAPIRequest $request)
    {
        $input = $request->all();

        /** @var District $district */
        $district = $this->districtRepository->find($id);

        if (empty($district)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/districts.singular')])
            );
        }

        $district = $this->districtRepository->update($input, $id);

        return $this->sendResponse(
            $district->toArray(),
            __('messages.updated', ['model' => __('models/districts.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/districts/{id}",
     *      summary="Remove the specified District from storage",
     *      tags={"District"},
     *      description="Delete District",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of District",
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
        /** @var District $district */
        $district = $this->districtRepository->find($id);

        if (empty($district)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/districts.singular')])
            );
        }

        $district->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/districts.singular')])
        );
    }
}
