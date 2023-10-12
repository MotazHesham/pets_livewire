@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.client.title_singular') }}:
                    {{ trans('cruds.client.fields.id') }}
                    {{ $client->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.id') }}
                            </th>
                            <td>
                                {{ $client->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.lat') }}
                            </th>
                            <td>
                                {{ $client->lat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.long') }}
                            </th>
                            <td>
                                {{ $client->long }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.address') }}
                            </th>
                            <td>
                                {{ $client->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.user') }}
                            </th>
                            <td>
                                @if($client->user)
                                    <span class="badge badge-relationship">{{ $client->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('client_edit')
                    <a href="{{ route('admin.clients.edit', $client) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection