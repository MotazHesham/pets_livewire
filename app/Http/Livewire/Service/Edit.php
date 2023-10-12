<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Service $service;

    public array $mediaToRemove = [];

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
                ->update(['model_id' => $this->service->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Service $service)
    {
        $this->service          = $service;
        $this->mediaCollections = [

            'service_image' => $service->image,
        ];
    }

    public function render()
    {
        return view('livewire.service.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->service->save();
        $this->syncMedia();

        return redirect()->route('admin.services.index');
    }

    protected function rules(): array
    {
        return [
            'service.name' => [
                'string',
                'required',
            ],
            'service.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.service_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.service_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
