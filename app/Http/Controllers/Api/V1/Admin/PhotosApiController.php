<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Photo;

class PhotosApiController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return $photos;
    }

    public function store(StorePhotoRequest $request)
    {
        return Photo::create($request->all());
    }

    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        return $photo->update($request->all());
    }

    public function show(Photo $photo)
    {
        return $photo;
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return response("OK", 200);
    }
}
