<?php

namespace App\Livewire\Admin\Clients;

use App\Livewire\Traits\Alert;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use Alert, WithFileUploads;

    // Modal Control
    public bool $modal = false;

    // Client ID
    public ?int $clientId = null;

    // Form Fields
    public ?string $name = null;
    public ?string $industry = null;
    public $logo = null;
    public ?string $existing_logo = null;
    public bool $is_active = true;
    public ?int $display_order = 0;

    public function render(): View
    {
        return view('livewire.admin.clients.edit');
    }

    // Event Listener - Load client data
    #[On('load::client')]
    public function load(Client $client): void
    {
        $this->clientId = $client->id;
        $this->name = $client->name;
        $this->industry = $client->industry;
        $this->existing_logo = $client->logo;
        $this->is_active = $client->is_active;
        $this->display_order = $client->display_order;

        $this->modal = true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'industry' => ['nullable', 'string', 'max:100'],
            'logo' => ['nullable', 'image', 'max:2048'],
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
            $client = Client::findOrFail($this->clientId);

            // Handle logo upload with resize
            if ($this->logo) {
                try {
                    // Delete old logo
                    if ($client->logo && \Storage::disk('public')->exists($client->logo)) {
                        \Storage::disk('public')->delete($client->logo);
                    }

                    // Create ImageManager
                    $manager = new ImageManager(new Driver());

                    // Read and resize image
                    $image = $manager->read($this->logo->getRealPath());
                    $image->scale(width: 256, height: 256);

                    // Create white canvas
                    $canvas = $manager->create(256, 256);
                    $canvas->fill('#ffffff');
                    $canvas->place($image, 'center');

                    // Generate filename
                    $filename = 'client-logo-' . time() . '-' . uniqid() . '.png';
                    $path = 'clients/logos/' . $filename;

                    // Ensure directory exists
                    if (!\Storage::disk('public')->exists('clients/logos')) {
                        \Storage::disk('public')->makeDirectory('clients/logos');
                    }

                    // Save
                    \Storage::disk('public')->put($path, $canvas->toPng());

                    $validated['logo'] = $path;
                } catch (\Exception $e) {
                    $this->error('Image Upload Failed', 'Failed to process logo: ' . $e->getMessage());
                    return;
                }
            }

            // Update client
            $client->update($validated);

            $this->dispatch('updated');
            $this->reset();
            $this->success('Client updated successfully');

        } catch (\Exception $e) {
            $this->error('Save Failed', 'An error occurred: ' . $e->getMessage());

            \Log::error('Client update failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    // Remove logo
    public function removeLogo(): void
    {
        $client = Client::find($this->clientId);

        if ($client && $client->logo) {
            // Delete from storage
            if (\Storage::disk('public')->exists($client->logo)) {
                \Storage::disk('public')->delete($client->logo);
            }

            // Update database
            $client->logo = null;
            $client->save();

            // Update component state
            $this->existing_logo = null;
            $this->logo = null;

            $this->success('Logo removed successfully');
        }
    }
}