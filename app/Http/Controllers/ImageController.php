<?php

namespace App\Http\Controllers;

use App\DataTables\ImageDataTable;
use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Repositories\ImageRepository;
use Flash;
use Response;

class ImageController extends AppBaseController
{
    /** @var  ImageRepository */
    private $imageRepository;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the Image.
     *
     * @param ImageDataTable $imageDataTable
     * @return Response
     */
    public function index(ImageDataTable $imageDataTable)
    {
        return $imageDataTable->render('images.index');
    }

    /**
     * Show the form for creating a new Image.
     *
     * @return Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created Image in storage.
     *
     * @param CreateImageRequest $request
     *
     * @return Response
     */
    public function store(CreateImageRequest $request)
    {
        $input = $request->all();

       $this->imageRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/images.singular')]));

        return redirect(route('images.index'));
    }

    /**
     * Display the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('models/images.singular').' '.__('messages.not_found'));

            return redirect(route('images.index'));
        }

        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('messages.not_found', ['model' => __('models/images.singular')]));

            return redirect(route('images.index'));
        }

        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified Image in storage.
     *
     * @param  int              $id
     * @param UpdateImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImageRequest $request)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('messages.not_found', ['model' => __('models/images.singular')]));

            return redirect(route('images.index'));
        }

        $image = $this->imageRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/images.singular')]));

        return redirect(route('images.index'));
    }

    /**
     * Remove the specified Image from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->find($id);

        if (empty($image)) {
            Flash::error(__('messages.not_found', ['model' => __('models/images.singular')]));

            return redirect(route('images.index'));
        }

        $this->imageRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/images.singular')]));

        return redirect(route('images.index'));
    }
}
