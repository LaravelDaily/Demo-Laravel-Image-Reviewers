@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.photo.title') }}
    </div>

    <div class="card-body">
        <div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.photo.fields.title') }}
                        </th>
                        <td>
                            {{ $photo->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.photo.fields.photo') }}
                        </th>
                        <td>
                            @if($photo->photo)
                                <a href="{{ $photo->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $photo->photo->getUrl() }}" width="150px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.photo.fields.approved') }}
                        </th>
                        <td>
                            {{ $photo->approved_at ? 'Yes' : 'No' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>
    </div>
</div>
@endsection