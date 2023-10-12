<?php

namespace App\Http\Livewire\Pet;

use App\Models\Client;
use App\Models\Pet;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Pet $pet;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->pet->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Pet $pet)
    {
        $this->pet = $pet;
        $this->initListsForFields();
        $this->mediaCollections = [

            'pet_image' => $pet->image,

        ];
    }

    public function render()
    {
        return view('livewire.pet.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->pet->save();
        $this->syncMedia();

        return redirect()->route('admin.pets.index');
    }

    protected function rules(): array
    {
        return [
            'pet.name' => [
                'string',
                'required',
            ],
            'pet.age' => [
                'string',
                'required',
            ],
            'pet.gender' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'pet.instagram_account' => [
                'string',
                'nullable',
            ],
            'mediaCollections.pet_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.pet_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'pet.client_id' => [
                'integer',
                'exists:clients,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['gender'] = $this->pet::GENDER_SELECT;
        $this->listsForFields['client'] = Client::pluck('address', 'id')->toArray();
    }
}
