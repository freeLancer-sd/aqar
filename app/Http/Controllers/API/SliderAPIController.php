<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSliderAPIRequest;
use App\Http\Requests\API\UpdateSliderAPIRequest;
use App\Models\Slider;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SliderController
 * @package App\Http\Controllers\API
 */
class SliderAPIController extends AppBaseController
{
    /** @var  SliderRepository */
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->sliderRepository = $sliderRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *      path="/sliders",
     *      summary="Get a listing of the Sliders.",
     *      tags={"Slider"},
     *      description="Get all Sliders",
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
     *                  @SWG\Items(ref="#/definitions/Slider")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index()
    {
        $sliders = $this->sliderRepository->allApi();

        return $this->sendResponse(
            $sliders->toArray(),
            __('lang.messages.retrieved', ['model' => __('models/sliders.plural')])
        );
    }

    /**
     * @param CreateSliderAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sliders",
     *      summary="Store a newly created Slider in storage",
     *      tags={"Slider"},
     *      description="Store Slider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Slider that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Slider")
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
     *                  ref="#/definitions/Slider"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSliderAPIRequest $request)
    {
        $input = $request->all();

        $slider = $this->sliderRepository->create($input);

        return $this->sendResponse(
            $slider->toArray(),
            __('lang.messages.saved', ['model' => __('models/sliders.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sliders/{id}",
     *      summary="Display the specified Slider",
     *      tags={"Slider"},
     *      description="Get Slider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Slider",
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
     *                  ref="#/definitions/Slider"
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
        /** @var Slider $slider */
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/sliders.singular')])
            );
        }

        return $this->sendResponse(
            $slider->toArray(),
            __('lang.messages.retrieved', ['model' => __('models/sliders.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateSliderAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sliders/{id}",
     *      summary="Update the specified Slider in storage",
     *      tags={"Slider"},
     *      description="Update Slider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Slider",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Slider that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Slider")
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
     *                  ref="#/definitions/Slider"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSliderAPIRequest $request)
    {
        $input = $request->all();

        /** @var Slider $slider */
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/sliders.singular')])
            );
        }

        $slider = $this->sliderRepository->update($input, $id);

        return $this->sendResponse(
            $slider->toArray(),
            __('lang.messages.updated', ['model' => __('models/sliders.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sliders/{id}",
     *      summary="Remove the specified Slider from storage",
     *      tags={"Slider"},
     *      description="Delete Slider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Slider",
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
        /** @var Slider $slider */
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/sliders.singular')])
            );
        }

        $slider->delete();

        return $this->sendResponse(
            $id,
            __('lang.messages.deleted', ['model' => __('models/sliders.singular')])
        );
    }
}
