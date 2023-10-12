@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.package.title_singular') }}:
                    {{ trans('cruds.package.fields.id') }}
                    {{ $package->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.id') }}
                            </th>
                            <td>
                                {{ $package->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.name') }}
                            </th>
                            <td>
                                {{ $package->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.low_price') }}
                            </th>
                            <td>
                                {{ $package->low_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.mid_price') }}
                            </th>
                            <td>
                                {{ $package->mid_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.high_price') }}
                            </th>
                            <td>
                                {{ $package->high_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.package.fields.services') }}
                            </th>
                            <td>
                                @foreach($package->services as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('package_edit')
                    <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection