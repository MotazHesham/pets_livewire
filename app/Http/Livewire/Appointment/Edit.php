<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Addon;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Package;
use App\Models\Pet;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $addons = [];

    public Appointment $appointment;

    public array $listsForFields = [];

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->addons      = $this->appointment->addons()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.appointment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->appointment->save();
        $this->appointment->addons()->sync($this->addons);

        return redirect()->route('admin.appointments.index');
    }

    protected function rules(): array
    {
        return [
            'appointment.client_id' => [
                'integer',
                'exists:clients,id',
                'required',
            ],
            'appointment.pet_id' => [
                'integer',
                'exists:pets,id',
                'required',
            ],
            'appointment.employee_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'appointment.package_id' => [
                'integer',
                'exists:packages,id',
                'required',
            ],
            'addons' => [
                'array',
            ],
            'addons.*.id' => [
                'integer',
                'exists:addons,id',
            ],
            'appointment.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'appointment.time' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
            'appointment.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'appointment.comment' => [
                'string',
                'nullable',
            ],
            'appointment.size' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['size'])),
            ],
            'appointment.price' => [
                'numeric',
                'required',
            ],
            'appointment.additional_info' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['client']   = Client::pluck('address', 'id')->toArray();
        $this->listsForFields['pet']      = Pet::pluck('name', 'id')->toArray();
        $this->listsForFields['employee'] = User::pluck('name', 'id')->toArray();
        $this->listsForFields['package']  = Package::pluck('name', 'id')->toArray();
        $this->listsForFields['addons']   = Addon::pluck('name', 'id')->toArray();
        $this->listsForFields['status']   = $this->appointment::STATUS_SELECT;
        $this->listsForFields['size']     = $this->appointment::SIZE_SELECT;
    }
}
