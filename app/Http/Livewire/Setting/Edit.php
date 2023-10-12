<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Setting $setting;

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
                ->update(['model_id' => $this->setting->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Setting $setting)
    {
        $this->setting          = $setting;
        $this->mediaCollections = [

            'setting_logo' => $setting->logo,

            'setting_image_about_us'       => $setting->image_about_us,
            'setting_image_login'          => $setting->image_login,
            'setting_image_our_service'    => $setting->image_our_service,
            'setting_image_easy_quick'     => $setting->image_easy_quick,
            'setting_image_client_reviews' => $setting->image_client_reviews,
            'setting_image_packages'       => $setting->image_packages,
            'setting_image_contact'        => $setting->image_contact,

        ];
    }

    public function render()
    {
        return view('livewire.setting.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->setting->save();
        $this->syncMedia();

        return redirect()->route('admin.settings.index');
    }

    protected function rules(): array
    {
        return [
            'setting.site_name' => [
                'string',
                'nullable',
            ],
            'mediaCollections.setting_logo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_logo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'setting.phone' => [
                'string',
                'nullable',
            ],
            'setting.email' => [
                'email:rfc',
                'nullable',
            ],
            'setting.address' => [
                'string',
                'nullable',
            ],
            'setting.twitter' => [
                'string',
                'nullable',
            ],
            'setting.facebook' => [
                'string',
                'nullable',
            ],
            'setting.googleplus' => [
                'string',
                'nullable',
            ],
            'setting.instagram' => [
                'string',
                'nullable',
            ],
            'setting.description' => [
                'string',
                'nullable',
            ],
            'setting.mission' => [
                'string',
                'nullable',
            ],
            'setting.visison' => [
                'string',
                'nullable',
            ],
            'mediaCollections.setting_image_about_us' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_image_about_us.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.setting_image_login' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_image_login.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.setting_image_our_service' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_image_our_service.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.setting_image_easy_quick' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_image_easy_quick.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.setting_image_client_reviews' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_image_client_reviews.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.setting_image_packages' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_image_packages.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.setting_image_contact' => [
                'array',
                'nullable',
            ],
            'mediaCollections.setting_image_contact.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'setting.count_to_loyalty' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'setting.package_loyalty' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'setting.appointment_count' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'setting.keywords_seo' => [
                'string',
                'nullable',
            ],
            'setting.author_seo' => [
                'string',
                'nullable',
            ],
            'setting.sitemap_link_seo' => [
                'string',
                'nullable',
            ],
            'setting.description_seo' => [
                'string',
                'nullable',
            ],
        ];
    }
}
