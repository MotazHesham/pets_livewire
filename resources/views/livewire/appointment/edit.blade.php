<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('appointment.client_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="client">{{ trans('cruds.appointment.fields.client') }}</label>
        <x-select-list class="form-control" required id="client" name="client" :options="$this->listsForFields['client']" wire:model="appointment.client_id" />
        <div class="validation-message">
            {{ $errors->first('appointment.client_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.client_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.pet_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="pet">{{ trans('cruds.appointment.fields.pet') }}</label>
        <x-select-list class="form-control" required id="pet" name="pet" :options="$this->listsForFields['pet']" wire:model="appointment.pet_id" />
        <div class="validation-message">
            {{ $errors->first('appointment.pet_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.pet_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.employee_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="employee">{{ trans('cruds.appointment.fields.employee') }}</label>
        <x-select-list class="form-control" required id="employee" name="employee" :options="$this->listsForFields['employee']" wire:model="appointment.employee_id" />
        <div class="validation-message">
            {{ $errors->first('appointment.employee_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.employee_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.package_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="package">{{ trans('cruds.appointment.fields.package') }}</label>
        <x-select-list class="form-control" required id="package" name="package" :options="$this->listsForFields['package']" wire:model="appointment.package_id" />
        <div class="validation-message">
            {{ $errors->first('appointment.package_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.package_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('addons') ? 'invalid' : '' }}">
        <label class="form-label" for="addons">{{ trans('cruds.appointment.fields.addons') }}</label>
        <x-select-list class="form-control" id="addons" name="addons" wire:model="addons" :options="$this->listsForFields['addons']" multiple />
        <div class="validation-message">
            {{ $errors->first('addons') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.addons_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.appointment.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="appointment.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('appointment.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.time') ? 'invalid' : '' }}">
        <label class="form-label required" for="time">{{ trans('cruds.appointment.fields.time') }}</label>
        <x-date-picker class="form-control" required wire:model="appointment.time" id="time" name="time" picker="time" />
        <div class="validation-message">
            {{ $errors->first('appointment.time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.appointment.fields.status') }}</label>
        <select class="form-control" wire:model="appointment.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('appointment.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.comment') ? 'invalid' : '' }}">
        <label class="form-label" for="comment">{{ trans('cruds.appointment.fields.comment') }}</label>
        <textarea class="form-control" name="comment" id="comment" wire:model.defer="appointment.comment" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('appointment.comment') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.comment_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.size') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.appointment.fields.size') }}</label>
        <select class="form-control" wire:model="appointment.size">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['size'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('appointment.size') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.size_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.price') ? 'invalid' : '' }}">
        <label class="form-label required" for="price">{{ trans('cruds.appointment.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" required wire:model.defer="appointment.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('appointment.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('appointment.additional_info') ? 'invalid' : '' }}">
        <label class="form-label" for="additional_info">{{ trans('cruds.appointment.fields.additional_info') }}</label>
        <input class="form-control" type="text" name="additional_info" id="additional_info" wire:model.defer="appointment.additional_info">
        <div class="validation-message">
            {{ $errors->first('appointment.additional_info') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.appointment.fields.additional_info_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>