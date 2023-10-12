<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('setting.site_name') ? 'invalid' : '' }}">
        <label class="form-label" for="site_name">{{ trans('cruds.setting.fields.site_name') }}</label>
        <input class="form-control" type="text" name="site_name" id="site_name" wire:model.defer="setting.site_name">
        <div class="validation-message">
            {{ $errors->first('setting.site_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.site_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_logo') ? 'invalid' : '' }}">
        <label class="form-label" for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
        <x-dropzone id="logo" name="logo" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_logo" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.logo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.phone') ? 'invalid' : '' }}">
        <label class="form-label" for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="setting.phone">
        <div class="validation-message">
            {{ $errors->first('setting.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.setting.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="setting.email">
        <div class="validation-message">
            {{ $errors->first('setting.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.setting.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" wire:model.defer="setting.address">
        <div class="validation-message">
            {{ $errors->first('setting.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.twitter') ? 'invalid' : '' }}">
        <label class="form-label" for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
        <input class="form-control" type="text" name="twitter" id="twitter" wire:model.defer="setting.twitter">
        <div class="validation-message">
            {{ $errors->first('setting.twitter') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.twitter_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.facebook') ? 'invalid' : '' }}">
        <label class="form-label" for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
        <input class="form-control" type="text" name="facebook" id="facebook" wire:model.defer="setting.facebook">
        <div class="validation-message">
            {{ $errors->first('setting.facebook') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.facebook_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.googleplus') ? 'invalid' : '' }}">
        <label class="form-label" for="googleplus">{{ trans('cruds.setting.fields.googleplus') }}</label>
        <input class="form-control" type="text" name="googleplus" id="googleplus" wire:model.defer="setting.googleplus">
        <div class="validation-message">
            {{ $errors->first('setting.googleplus') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.googleplus_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.instagram') ? 'invalid' : '' }}">
        <label class="form-label" for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
        <input class="form-control" type="text" name="instagram" id="instagram" wire:model.defer="setting.instagram">
        <div class="validation-message">
            {{ $errors->first('setting.instagram') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.instagram_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.setting.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="setting.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('setting.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.mission') ? 'invalid' : '' }}">
        <label class="form-label" for="mission">{{ trans('cruds.setting.fields.mission') }}</label>
        <textarea class="form-control" name="mission" id="mission" wire:model.defer="setting.mission" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('setting.mission') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.mission_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.visison') ? 'invalid' : '' }}">
        <label class="form-label" for="visison">{{ trans('cruds.setting.fields.visison') }}</label>
        <textarea class="form-control" name="visison" id="visison" wire:model.defer="setting.visison" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('setting.visison') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.visison_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_image_about_us') ? 'invalid' : '' }}">
        <label class="form-label" for="image_about_us">{{ trans('cruds.setting.fields.image_about_us') }}</label>
        <x-dropzone id="image_about_us" name="image_about_us" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_image_about_us" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_image_about_us') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.image_about_us_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_image_login') ? 'invalid' : '' }}">
        <label class="form-label" for="image_login">{{ trans('cruds.setting.fields.image_login') }}</label>
        <x-dropzone id="image_login" name="image_login" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_image_login" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_image_login') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.image_login_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_image_our_service') ? 'invalid' : '' }}">
        <label class="form-label" for="image_our_service">{{ trans('cruds.setting.fields.image_our_service') }}</label>
        <x-dropzone id="image_our_service" name="image_our_service" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_image_our_service" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_image_our_service') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.image_our_service_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_image_easy_quick') ? 'invalid' : '' }}">
        <label class="form-label" for="image_easy_quick">{{ trans('cruds.setting.fields.image_easy_quick') }}</label>
        <x-dropzone id="image_easy_quick" name="image_easy_quick" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_image_easy_quick" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_image_easy_quick') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.image_easy_quick_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_image_client_reviews') ? 'invalid' : '' }}">
        <label class="form-label" for="image_client_reviews">{{ trans('cruds.setting.fields.image_client_reviews') }}</label>
        <x-dropzone id="image_client_reviews" name="image_client_reviews" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_image_client_reviews" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_image_client_reviews') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.image_client_reviews_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_image_packages') ? 'invalid' : '' }}">
        <label class="form-label" for="image_packages">{{ trans('cruds.setting.fields.image_packages') }}</label>
        <x-dropzone id="image_packages" name="image_packages" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_image_packages" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_image_packages') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.image_packages_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.setting_image_contact') ? 'invalid' : '' }}">
        <label class="form-label" for="image_contact">{{ trans('cruds.setting.fields.image_contact') }}</label>
        <x-dropzone id="image_contact" name="image_contact" action="{{ route('admin.settings.storeMedia') }}" collection-name="setting_image_contact" max-file-size="5" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.setting_image_contact') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.image_contact_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.count_to_loyalty') ? 'invalid' : '' }}">
        <label class="form-label" for="count_to_loyalty">{{ trans('cruds.setting.fields.count_to_loyalty') }}</label>
        <input class="form-control" type="number" name="count_to_loyalty" id="count_to_loyalty" wire:model.defer="setting.count_to_loyalty" step="1">
        <div class="validation-message">
            {{ $errors->first('setting.count_to_loyalty') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.count_to_loyalty_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.package_loyalty') ? 'invalid' : '' }}">
        <label class="form-label" for="package_loyalty">{{ trans('cruds.setting.fields.package_loyalty') }}</label>
        <input class="form-control" type="number" name="package_loyalty" id="package_loyalty" wire:model.defer="setting.package_loyalty" step="1">
        <div class="validation-message">
            {{ $errors->first('setting.package_loyalty') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.package_loyalty_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.appointment_count') ? 'invalid' : '' }}">
        <label class="form-label" for="appointment_count">{{ trans('cruds.setting.fields.appointment_count') }}</label>
        <input class="form-control" type="number" name="appointment_count" id="appointment_count" wire:model.defer="setting.appointment_count" step="1">
        <div class="validation-message">
            {{ $errors->first('setting.appointment_count') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.appointment_count_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.keywords_seo') ? 'invalid' : '' }}">
        <label class="form-label" for="keywords_seo">{{ trans('cruds.setting.fields.keywords_seo') }}</label>
        <textarea class="form-control" name="keywords_seo" id="keywords_seo" wire:model.defer="setting.keywords_seo" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('setting.keywords_seo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.keywords_seo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.author_seo') ? 'invalid' : '' }}">
        <label class="form-label" for="author_seo">{{ trans('cruds.setting.fields.author_seo') }}</label>
        <input class="form-control" type="text" name="author_seo" id="author_seo" wire:model.defer="setting.author_seo">
        <div class="validation-message">
            {{ $errors->first('setting.author_seo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.author_seo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.sitemap_link_seo') ? 'invalid' : '' }}">
        <label class="form-label" for="sitemap_link_seo">{{ trans('cruds.setting.fields.sitemap_link_seo') }}</label>
        <input class="form-control" type="text" name="sitemap_link_seo" id="sitemap_link_seo" wire:model.defer="setting.sitemap_link_seo">
        <div class="validation-message">
            {{ $errors->first('setting.sitemap_link_seo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.sitemap_link_seo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('setting.description_seo') ? 'invalid' : '' }}">
        <label class="form-label" for="description_seo">{{ trans('cruds.setting.fields.description_seo') }}</label>
        <textarea class="form-control" name="description_seo" id="description_seo" wire:model.defer="setting.description_seo" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('setting.description_seo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.setting.fields.description_seo_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>