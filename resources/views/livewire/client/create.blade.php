<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('client.lat') ? 'invalid' : '' }}">
        <label class="form-label" for="lat">{{ trans('cruds.client.fields.lat') }}</label>
        <input class="form-control" type="text" name="lat" id="lat" wire:model.defer="client.lat">
        <div class="validation-message">
            {{ $errors->first('client.lat') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.lat_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('client.long') ? 'invalid' : '' }}">
        <label class="form-label" for="long">{{ trans('cruds.client.fields.long') }}</label>
        <input class="form-control" type="text" name="long" id="long" wire:model.defer="client.long">
        <div class="validation-message">
            {{ $errors->first('client.long') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.long_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('client.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.client.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" wire:model.defer="client.address">
        <div class="validation-message">
            {{ $errors->first('client.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('client.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.client.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="client.user_id" />
        <div class="validation-message">
            {{ $errors->first('client.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.client.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>