<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('addon.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.addon.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="addon.name">
        <div class="validation-message">
            {{ $errors->first('addon.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.addon.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('addon.price') ? 'invalid' : '' }}">
        <label class="form-label required" for="price">{{ trans('cruds.addon.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" required wire:model.defer="addon.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('addon.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.addon.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.addon_icon') ? 'invalid' : '' }}">
        <label class="form-label" for="icon">{{ trans('cruds.addon.fields.icon') }}</label>
        <x-dropzone id="icon" name="icon" action="{{ route('admin.addons.storeMedia') }}" collection-name="addon_icon" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.addon_icon') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.addon.fields.icon_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('addon.active') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="active" id="active" wire:model.defer="addon.active">
        <label class="form-label inline ml-1" for="active">{{ trans('cruds.addon.fields.active') }}</label>
        <div class="validation-message">
            {{ $errors->first('addon.active') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.addon.fields.active_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.addons.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>