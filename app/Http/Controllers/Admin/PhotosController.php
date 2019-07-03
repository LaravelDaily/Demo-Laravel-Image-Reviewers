<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPhotoRequest;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Photo;
use App\Role;
use Carbon\Carbon;

class PhotosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('photo_access'), 403);

        $photos = Photo::all();

        return view('admin.photos.index', compact('photos'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('photo_create'), 403);

        return view('admin.photos.create');
    }

    public function store(StorePhotoRequest $request)
    {
        abort_unless(\Gate::allows('photo_create'), 403);

        $photo = Photo::create($request->all());

        if ($request->input('photo', false)) {
            $photo->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.photos.index');
    }

    public function edit(Photo $photo)
    {
        abort_unless(\Gate::allows('photo_edit'), 403);

        $photo->load('created_by');
        $reviewers = Role::findOrFail(3)->users()->get();

        return view('admin.photos.edit', compact('photo', 'reviewers'));
    }

    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        abort_unless(\Gate::allows('photo_edit'), 403);

        $request['approved_at'] = $request->input('approved_at', false) ? Carbon::now()->toDateTimeString() : null;

        $photo->update($request->all());

        if ($request->input('photo', false)) {
            if (!$photo->photo || $request->input('photo') !== $photo->photo->file_name) {
                $photo->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($photo->photo) {
            $photo->photo->delete();
        }

        return redirect()->route('admin.photos.index');
    }

    public function show(Photo $photo)
    {
        abort_unless(\Gate::allows('photo_show'), 403);

        $photo->load('created_by');

        return view('admin.photos.show', compact('photo'));
    }

    public function destroy(Photo $photo)
    {
        abort_unless(\Gate::allows('photo_delete'), 403);

        $photo->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhotoRequest $request)
    {
        Photo::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function indexReview()
    {
        abort_unless(\Gate::allows('photo_review'), 403);

        $photos = Photo::reviewersPhotos()->get();

        return view('admin.photos.index', compact('photos'));
    }
}
