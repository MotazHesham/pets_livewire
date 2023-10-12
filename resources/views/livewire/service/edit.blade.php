<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('service.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.service.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="service.name">
        <div class="validation-message">
            {{ $errors->first('service.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.service.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('service.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.service.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="service.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('service.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.service.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.service_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.service.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.services.storeMedia') }}" collection-name="service_image" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.service_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.service.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>