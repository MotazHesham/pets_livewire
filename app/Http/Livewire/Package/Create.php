<?php

namespace App\Http\Livewire\Package;

use App\Models\Package;
use App\Models\Service;
use Livewire\Component;

class Create extends Component
{
    public Package $package;

    public array $services = [];

    public array $listsForFields = [];

    public function mount(Package $package)
    {
        $this->package = $package;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.package.create');
    }

    public function submit()
    {
        $this->validate();

        $this->package->save();
        $this->package->services()->sync($this->services);

        return redirect()->route('admin.packages.index');
    }

    protected function rules(): array
    {
        return [
            'package.name' => [
                'string',
                'required',
            ],
            'package.low_price' => [
                'numeric',
                'required',
            ],
            'package.mid_price' => [
                'numeric',
                'required',
            ],
            'package.high_price' => [
                'numeric',
                'required',
            ],
            'services' => [
                'required',
                'array',
            ],
            'services.*.id' => [
                'integer',
                'exists:services,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['services'] = Service::pluck('name', 'id')->toArray();
    }
}
