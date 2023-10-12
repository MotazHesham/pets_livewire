<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mediaCollections.slider_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="image">{{ trans('cruds.slider.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.sliders.storeMedia') }}" collection-name="slider_image" max-file-size="10" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.slider_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.slider.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="slider.title">
        <div class="validation-message">
            {{ $errors->first('slider.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.body') ? 'invalid' : '' }}">
        <label class="form-label" for="body">{{ trans('cruds.slider.fields.body') }}</label>
        <textarea class="form-control" name="body" id="body" wire:model.defer="slider.body" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('slider.body') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.body_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.button_name') ? 'invalid' : '' }}">
        <label class="form-label" for="button_name">{{ trans('cruds.slider.fields.button_name') }}</label>
        <input class="form-control" type="text" name="button_name" id="button_name" wire:model.defer="slider.button_name">
        <div class="validation-message">
            {{ $errors->first('slider.button_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.button_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slider.link') ? 'invalid' : '' }}">
        <label class="form-label" for="link">{{ trans('cruds.slider.fields.link') }}</label>
        <input class="form-control" type="text" name="link" id="link" wire:model.defer="slider.link">
        <div class="validation-message">
            {{ $errors->first('slider.link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.slider.fields.link_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>