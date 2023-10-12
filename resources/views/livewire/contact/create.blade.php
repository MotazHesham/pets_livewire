<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('contact.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.contact.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="contact.name">
        <div class="validation-message">
            {{ $errors->first('contact.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contact.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contact.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.contact.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="contact.email">
        <div class="validation-message">
            {{ $errors->first('contact.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contact.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contact.subject') ? 'invalid' : '' }}">
        <label class="form-label" for="subject">{{ trans('cruds.contact.fields.subject') }}</label>
        <input class="form-control" type="text" name="subject" id="subject" wire:model.defer="contact.subject">
        <div class="validation-message">
            {{ $errors->first('contact.subject') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contact.fields.subject_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contact.message') ? 'invalid' : '' }}">
        <label class="form-label" for="message">{{ trans('cruds.contact.fields.message') }}</label>
        <textarea class="form-control" name="message" id="message" wire:model.defer="contact.message" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('contact.message') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contact.fields.message_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>