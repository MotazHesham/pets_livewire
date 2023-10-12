<?php

namespace App\Http\Livewire\Addon;

use App\Models\Addon;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Addon $addon;

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
                ->update(['model_id' => $this->addon->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Addon $addon)
    {
        $this->addon            = $addon;
        $this->mediaCollections = [

            'addon_icon' => $addon->icon,

        ];
    }

    public function render()
    {
        return view('livewire.addon.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->addon->save();
        $this->syncMedia();

        return redirect()->route('admin.addons.index');
    }

    protected function rules(): array
    {
        return [
            'addon.name' => [
                'string',
                'required',
            ],
            'addon.price' => [
                'numeric',
                'required',
            ],
            'mediaCollections.addon_icon' => [
                'array',
                'nullable',
            ],
            'mediaCollections.addon_icon.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'addon.active' => [
                'boolean',
            ],
        ];
    }
}
