@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ trans('cruds.photo.title') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container-fluid">
                        <div class="row">
                            @forelse ($photos as $photo)
                                <div class="col-md-3 mb-2">
                                    @if($photo->photo)
                                        <a href="{{ $photo->photo->getUrl() }}" target="_blank">
                                            <img src="{{ $photo->photo->getUrl() }}" class="img-thumbnail" width="150px">
                                        </a>
                                    @endif
                                </div>
                            @empty
                                <div class="w-100">
                                    <p class="text-center">{{ trans('panel.empty') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection