<?php

namespace App\Http\Livewire\Slider;

use App\Models\Slider;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Slider $slider;

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
                ->update(['model_id' => $this->slider->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Slider $slider)
    {
        $this->slider           = $slider;
        $this->mediaCollections = [
            'slider_image' => $slider->image,

        ];
    }

    public function render()
    {
        return view('livewire.slider.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->slider->save();
        $this->syncMedia();

        return redirect()->route('admin.sliders.index');
    }

    protected function rules(): array
    {
        return [
            'mediaCollections.slider_image' => [
                'array',
                'required',
            ],
            'mediaCollections.slider_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'slider.title' => [
                'string',
                'nullable',
            ],
            'slider.body' => [
                'string',
                'nullable',
            ],
            'slider.button_name' => [
                'string',
                'nullable',
            ],
            'slider.link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
