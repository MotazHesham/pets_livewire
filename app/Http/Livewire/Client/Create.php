<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Client $client;

    public array $listsForFields = [];

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.client.create');
    }

    public function submit()
    {
        $this->validate();

        $this->client->save();

        return redirect()->route('admin.clients.index');
    }

    protected function rules(): array
    {
        return [
            'client.lat' => [
                'string',
                'nullable',
            ],
            'client.long' => [
                'string',
                'nullable',
            ],
            'client.address' => [
                'string',
                'nullable',
            ],
            'client.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
