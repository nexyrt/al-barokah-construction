<?php

namespace App\Livewire\Admin\Clients;

use App\Livewire\Traits\Alert;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use Alert, WithFileUploads;

    // Modal Control
    public bool $modal = false;

    // Form Fields
    public ?string $name = null;
    public ?string $industry = null;
    public $logo = null;
    public bool $is_active = true;
    public ?int $display_order = 0;

    public function render(): View
    {
        return view('livewire.admin.clients.create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'industry' => ['nullable', 'string', 'max:100'],
            'logo' => ['nullable', 'image', 'max:2048'], // 2MB max
            'is_active' => ['boolean'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function save(): void
    {
        try {
            $validated = $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors();
            $firstError = $errors->first();

            $this->error('Validation Failed', $firstError);
            return;
        }

        try {
            // Handle logo upload with resize to 256x256 (for w-16 h-16 = 64px display, 4x for retina)
            if ($this->logo) {
                try {
                    // Create ImageManager with GD driver (Intervention Image v3)
                    $manager = new ImageManager(new Driver());

                    // Read image
                    $image = $manager->read($this->logo->getRealPath());

                    // Resize to 256x256 (square, maintaining aspect ratio with contain mode)
                    $image->scale(width: 256, height: 256);

                    // Create white canvas 256x256
                    $canvas = $manager->create(256, 256);
                    $canvas->fill('#ffffff');

                    // Place image in center of canvas
                    $canvas->place($image, 'center');

                    // Generate filename
                    $filename = 'client-logo-' . time() . '-' . uniqid() . '.png';
                    $path = 'clients/logos/' . $filename;

                    // Ensure directory exists
                    if (!\Storage::disk('public')->exists('clients/logos')) {
                        \Storage::disk('public')->makeDirectory('clients/logos');
                    }

                    // Save as PNG with transparency support
                    \Storage::disk('public')->put($path, $canvas->toPng());

                    $validated['logo'] = $path;
                } catch (\Exception $e) {
                    $this->error('Image Upload Failed', 'Failed to process logo: ' . $e->getMessage());
                    return;
                }
            }

            // Create client
            Client::create($validated);

            $this->dispatch('created');
            $this->reset();
            $this->success('Client created successfully');

        } catch (\Exception $e) {
            $this->error('Save Failed', 'An error occurred: ' . $e->getMessage());

            \Log::error('Client create failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}