@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.addon.title_singular') }}:
                    {{ trans('cruds.addon.fields.id') }}
                    {{ $addon->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.addon.fields.id') }}
                            </th>
                            <td>
                                {{ $addon->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.addon.fields.name') }}
                            </th>
                            <td>
                                {{ $addon->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.addon.fields.price') }}
                            </th>
                            <td>
                                {{ $addon->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.addon.fields.icon') }}
                            </th>
                            <td>
                                @foreach($addon->icon as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.addon.fields.active') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $addon->active ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('addon_edit')
                    <a href="{{ route('admin.addons.edit', $addon) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.addons.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection