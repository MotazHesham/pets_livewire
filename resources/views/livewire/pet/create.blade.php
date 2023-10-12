<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('pet.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.pet.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="pet.name">
        <div class="validation-message">
            {{ $errors->first('pet.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pet.age') ? 'invalid' : '' }}">
        <label class="form-label required" for="age">{{ trans('cruds.pet.fields.age') }}</label>
        <input class="form-control" type="text" name="age" id="age" required wire:model.defer="pet.age">
        <div class="validation-message">
            {{ $errors->first('pet.age') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.age_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pet.gender') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.pet.fields.gender') }}</label>
        <select class="form-control" wire:model="pet.gender">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['gender'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('pet.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.gender_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pet.instagram_account') ? 'invalid' : '' }}">
        <label class="form-label" for="instagram_account">{{ trans('cruds.pet.fields.instagram_account') }}</label>
        <input class="form-control" type="text" name="instagram_account" id="instagram_account" wire:model.defer="pet.instagram_account">
        <div class="validation-message">
            {{ $errors->first('pet.instagram_account') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.instagram_account_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.pet_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.pet.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.pets.storeMedia') }}" collection-name="pet_image" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.pet_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pet.client_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="client">{{ trans('cruds.pet.fields.client') }}</label>
        <x-select-list class="form-control" required id="client" name="client" :options="$this->listsForFields['client']" wire:model="pet.client_id" />
        <div class="validation-message">
            {{ $errors->first('pet.client_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pet.fields.client_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.pets.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>