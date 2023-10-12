@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.appointment.title_singular') }}:
                    {{ trans('cruds.appointment.fields.id') }}
                    {{ $appointment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.id') }}
                            </th>
                            <td>
                                {{ $appointment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.client') }}
                            </th>
                            <td>
                                @if($appointment->client)
                                    <span class="badge badge-relationship">{{ $appointment->client->address ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.pet') }}
                            </th>
                            <td>
                                @if($appointment->pet)
                                    <span class="badge badge-relationship">{{ $appointment->pet->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.employee') }}
                            </th>
                            <td>
                                @if($appointment->employee)
                                    <span class="badge badge-relationship">{{ $appointment->employee->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.package') }}
                            </th>
                            <td>
                                @if($appointment->package)
                                    <span class="badge badge-relationship">{{ $appointment->package->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.addons') }}
                            </th>
                            <td>
                                @foreach($appointment->addons as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.date') }}
                            </th>
                            <td>
                                {{ $appointment->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.time') }}
                            </th>
                            <td>
                                {{ $appointment->time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.status') }}
                            </th>
                            <td>
                                {{ $appointment->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.comment') }}
                            </th>
                            <td>
                                {{ $appointment->comment }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.size') }}
                            </th>
                            <td>
                                {{ $appointment->size_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.price') }}
                            </th>
                            <td>
                                {{ $appointment->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.additional_info') }}
                            </th>
                            <td>
                                {{ $appointment->additional_info }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.reminded') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $appointment->reminded ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.is_it_loyalty_appoint') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $appointment->is_it_loyalty_appoint ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('appointment_edit')
                    <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection