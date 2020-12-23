<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConditionAPIRequest;
use App\Http\Requests\API\UpdateConditionAPIRequest;
use App\Models\Condition;
use App\Repositories\ConditionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConditionController
 * @package App\Http\Controllers\API
 */

class ConditionAPIController extends AppBaseController
{
    /** @var  ConditionRepository */
    private $conditionRepository;

    public function __construct(ConditionRepository $conditionRepo)
    {
        $this->conditionRepository = $conditionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/conditions",
     *      summary="Get a listing of the Conditions.",
     *      tags={"Condition"},
     *      description="Get all Conditions",
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
     *                  @SWG\Items(ref="#/definitions/Condition")
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
        $conditions = $this->conditionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $conditions->toArray(),
            __('lang.messages.retrieved', ['model' => __('models/conditions.plural')])
        );
    }

    /**
     * @param CreateConditionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/conditions",
     *      summary="Store a newly created Condition in storage",
     *      tags={"Condition"},
     *      description="Store Condition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Condition that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Condition")
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
     *                  ref="#/definitions/Condition"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConditionAPIRequest $request)
    {
        $input = $request->all();

        $condition = $this->conditionRepository->create($input);

        return $this->sendResponse(
            $condition->toArray(),
            __('lang.messages.saved', ['model' => __('models/conditions.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/conditions/{id}",
     *      summary="Display the specified Condition",
     *      tags={"Condition"},
     *      description="Get Condition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Condition",
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
     *                  ref="#/definitions/Condition"
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
        /** @var Condition $condition */
        $condition = $this->conditionRepository->find($id);

        if (empty($condition)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/conditions.singular')])
            );
        }

        return $this->sendResponse(
            $condition->toArray(),
            __('lang.messages.retrieved', ['model' => __('models/conditions.singular')])
        );
    }

    /**
     * @param int $id
     * @param UpdateConditionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/conditions/{id}",
     *      summary="Update the specified Condition in storage",
     *      tags={"Condition"},
     *      description="Update Condition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Condition",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Condition that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Condition")
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
     *                  ref="#/definitions/Condition"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConditionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Condition $condition */
        $condition = $this->conditionRepository->find($id);

        if (empty($condition)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/conditions.singular')])
            );
        }

        $condition = $this->conditionRepository->update($input, $id);

        return $this->sendResponse(
            $condition->toArray(),
            __('lang.messages.updated', ['model' => __('models/conditions.singular')])
        );
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/conditions/{id}",
     *      summary="Remove the specified Condition from storage",
     *      tags={"Condition"},
     *      description="Delete Condition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Condition",
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
        /** @var Condition $condition */
        $condition = $this->conditionRepository->find($id);

        if (empty($condition)) {
            return $this->sendError(
                __('lang.messages.not_found', ['model' => __('models/conditions.singular')])
            );
        }

        $condition->delete();

        return $this->sendResponse(
            $id,
            __('lang.messages.deleted', ['model' => __('models/conditions.singular')])
        );
    }
}
