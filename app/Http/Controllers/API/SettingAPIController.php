<?php

namespace App\Http\Controllers\API;

//use App\Models\Setting;
use App\Repositories\SettingRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SettingController
 * @package App\Http\Controllers\API
 */
class SettingAPIController extends AppBaseController
{
    /** @var  SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *      path="/settings",
     *      summary="Get a listing of the Settings.",
     *      tags={"Setting"},
     *      description="Get all Settings",
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
     *                  @SWG\Items(ref="#/definitions/Setting")
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
        $settings = cache()->remember('setting', 60 * 60 * 360, function () {
            $this->settingRepository->all()->first();
        });

        return $this->sendResponse(
            $settings,
            __('lang.messages.retrieved', ['model' => __('models/settings.plural')])
        );
    }

    /**
     * updateUser a update users resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user) {
            $user->device_token = $request->device_token;
            $user->save();
            return true;
        } else {
            return false;
        }
    }
}
