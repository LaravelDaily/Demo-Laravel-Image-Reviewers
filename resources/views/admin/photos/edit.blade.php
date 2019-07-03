@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.photo.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.photos.update", [$photo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.photo.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($photo) ? $photo->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.photo.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.photo.fields.photo') }}*</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.photo.fields.photo_helper') }}
                </p>
            </div>
            @can('user_management_access')
                <div class="form-group">
                    <label for="reviewer">{{ trans('cruds.photo.fields.reviewer') }}</label>
                    <select class="form-control {{ $errors->has('reviewer_id') ? 'has-error' : '' }}" id="reviewer" name="reviewer_id">
                        <option value="">-</option>
                        @foreach($reviewers as $reviewer)
                            <option value="{{ $reviewer->id }}"  @if(isset($photo) && $photo->reviewer_id == $reviewer->id) selected @endif>{{ $reviewer->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('reviewer_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('reviewer_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.photo.fields.reviewer_helper') }}
                    </p>
                </div>
            @endcan
            @can('photo_review')
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="approved" name="approved_at" @if(isset($photo->approved_at)) checked @endif>
                        <label for="approved" class="form-check-label">{{ trans('cruds.photo.fields.approved') }}</label>
                    </div>
                    <p class="helper-block">
                        {{ trans('cruds.photo.fields.approved_helper') }}
                    </p>
                </div>
            @endcan
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.photos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      $('form').find('input[name="photo"]').remove()
      this.options.maxFiles = this.options.maxFiles + 1
    },
    init: function () {
@if(isset($photo) && $photo->photo)
      var file = {!! json_encode($photo->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop