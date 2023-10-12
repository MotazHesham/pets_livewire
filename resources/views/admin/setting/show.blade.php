@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.setting.title_singular') }}:
                    {{ trans('cruds.setting.fields.id') }}
                    {{ $setting->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.id') }}
                            </th>
                            <td>
                                {{ $setting->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.site_name') }}
                            </th>
                            <td>
                                {{ $setting->site_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.logo') }}
                            </th>
                            <td>
                                @foreach($setting->logo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.phone') }}
                            </th>
                            <td>
                                {{ $setting->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $setting->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $setting->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.address') }}
                            </th>
                            <td>
                                {{ $setting->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.twitter') }}
                            </th>
                            <td>
                                {{ $setting->twitter }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.facebook') }}
                            </th>
                            <td>
                                {{ $setting->facebook }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.googleplus') }}
                            </th>
                            <td>
                                {{ $setting->googleplus }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.instagram') }}
                            </th>
                            <td>
                                {{ $setting->instagram }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.description') }}
                            </th>
                            <td>
                                {{ $setting->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.mission') }}
                            </th>
                            <td>
                                {{ $setting->mission }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.visison') }}
                            </th>
                            <td>
                                {{ $setting->visison }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.image_about_us') }}
                            </th>
                            <td>
                                @foreach($setting->image_about_us as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.image_login') }}
                            </th>
                            <td>
                                @foreach($setting->image_login as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.image_our_service') }}
                            </th>
                            <td>
                                @foreach($setting->image_our_service as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.image_easy_quick') }}
                            </th>
                            <td>
                                @foreach($setting->image_easy_quick as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.image_client_reviews') }}
                            </th>
                            <td>
                                @foreach($setting->image_client_reviews as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.image_packages') }}
                            </th>
                            <td>
                                @foreach($setting->image_packages as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.image_contact') }}
                            </th>
                            <td>
                                @foreach($setting->image_contact as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.count_to_loyalty') }}
                            </th>
                            <td>
                                {{ $setting->count_to_loyalty }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.package_loyalty') }}
                            </th>
                            <td>
                                {{ $setting->package_loyalty }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.appointment_count') }}
                            </th>
                            <td>
                                {{ $setting->appointment_count }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.keywords_seo') }}
                            </th>
                            <td>
                                {{ $setting->keywords_seo }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.author_seo') }}
                            </th>
                            <td>
                                {{ $setting->author_seo }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.sitemap_link_seo') }}
                            </th>
                            <td>
                                {{ $setting->sitemap_link_seo }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.setting.fields.description_seo') }}
                            </th>
                            <td>
                                {{ $setting->description_seo }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('setting_edit')
                    <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection