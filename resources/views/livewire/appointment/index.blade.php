<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('appointment_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Appointment" format="csv" />
                <livewire:excel-export model="Appointment" format="xlsx" />
                <livewire:excel-export model="Appointment" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.appointment.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.client') }}
                            @include('components.table.sort', ['field' => 'client.address'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.pet') }}
                            @include('components.table.sort', ['field' => 'pet.name'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.employee') }}
                            @include('components.table.sort', ['field' => 'employee.name'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.package') }}
                            @include('components.table.sort', ['field' => 'package.name'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.addons') }}
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.time') }}
                            @include('components.table.sort', ['field' => 'time'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.size') }}
                            @include('components.table.sort', ['field' => 'size'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.price') }}
                            @include('components.table.sort', ['field' => 'price'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.is_it_loyalty_appoint') }}
                            @include('components.table.sort', ['field' => 'is_it_loyalty_appoint'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $appointment->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $appointment->id }}
                            </td>
                            <td>
                                @if($appointment->client)
                                    <span class="badge badge-relationship">{{ $appointment->client->address ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($appointment->pet)
                                    <span class="badge badge-relationship">{{ $appointment->pet->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($appointment->employee)
                                    <span class="badge badge-relationship">{{ $appointment->employee->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($appointment->package)
                                    <span class="badge badge-relationship">{{ $appointment->package->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($appointment->addons as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $appointment->date }}
                            </td>
                            <td>
                                {{ $appointment->time }}
                            </td>
                            <td>
                                {{ $appointment->status_label }}
                            </td>
                            <td>
                                {{ $appointment->size_label }}
                            </td>
                            <td>
                                {{ $appointment->price }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $appointment->is_it_loyalty_appoint ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('appointment_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.appointments.show', $appointment) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('appointment_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.appointments.edit', $appointment) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('appointment_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $appointment->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $appointments->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush