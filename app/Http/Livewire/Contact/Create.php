<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class Create extends Component
{
    public Contact $contact;

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('livewire.contact.create');
    }

    public function submit()
    {
        $this->validate();

        $this->contact->save();

        return redirect()->route('admin.contacts.index');
    }

    protected function rules(): array
    {
        return [
            'contact.name' => [
                'string',
                'nullable',
            ],
            'contact.email' => [
                'email:rfc',
                'nullable',
            ],
            'contact.subject' => [
                'string',
                'nullable',
            ],
            'contact.message' => [
                'string',
                'nullable',
            ],
        ];
    }
}
