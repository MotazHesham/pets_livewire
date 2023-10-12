<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('package.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.package.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="package.name">
        <div class="validation-message">
            {{ $errors->first('package.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.low_price') ? 'invalid' : '' }}">
        <label class="form-label required" for="low_price">{{ trans('cruds.package.fields.low_price') }}</label>
        <input class="form-control" type="number" name="low_price" id="low_price" required wire:model.defer="package.low_price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('package.low_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.low_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.mid_price') ? 'invalid' : '' }}">
        <label class="form-label required" for="mid_price">{{ trans('cruds.package.fields.mid_price') }}</label>
        <input class="form-control" type="number" name="mid_price" id="mid_price" required wire:model.defer="package.mid_price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('package.mid_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.mid_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('package.high_price') ? 'invalid' : '' }}">
        <label class="form-label required" for="high_price">{{ trans('cruds.package.fields.high_price') }}</label>
        <input class="form-control" type="number" name="high_price" id="high_price" required wire:model.defer="package.high_price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('package.high_price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.high_price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('services') ? 'invalid' : '' }}">
        <label class="form-label required" for="services">{{ trans('cruds.package.fields.services') }}</label>
        <x-select-list class="form-control" required id="services" name="services" wire:model="services" :options="$this->listsForFields['services']" multiple />
        <div class="validation-message">
            {{ $errors->first('services') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.package.fields.services_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>