@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.slider.title_singular') }}:
                    {{ trans('cruds.slider.fields.id') }}
                    {{ $slider->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.slider.fields.id') }}
                            </th>
                            <td>
                                {{ $slider->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.slider.fields.image') }}
                            </th>
                            <td>
                                @foreach($slider->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.slider.fields.title') }}
                            </th>
                            <td>
                                {{ $slider->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.slider.fields.body') }}
                            </th>
                            <td>
                                {{ $slider->body }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.slider.fields.button_name') }}
                            </th>
                            <td>
                                {{ $slider->button_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.slider.fields.link') }}
                            </th>
                            <td>
                                {{ $slider->link }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('slider_edit')
                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection