@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.pet.title_singular') }}:
                    {{ trans('cruds.pet.fields.id') }}
                    {{ $pet->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.id') }}
                            </th>
                            <td>
                                {{ $pet->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.name') }}
                            </th>
                            <td>
                                {{ $pet->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.age') }}
                            </th>
                            <td>
                                {{ $pet->age }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.gender') }}
                            </th>
                            <td>
                                {{ $pet->gender_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.instagram_account') }}
                            </th>
                            <td>
                                {{ $pet->instagram_account }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.image') }}
                            </th>
                            <td>
                                @foreach($pet->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.pet.fields.client') }}
                            </th>
                            <td>
                                @if($pet->client)
                                    <span class="badge badge-relationship">{{ $pet->client->address ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('pet_edit')
                    <a href="{{ route('admin.pets.edit', $pet) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.pets.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection