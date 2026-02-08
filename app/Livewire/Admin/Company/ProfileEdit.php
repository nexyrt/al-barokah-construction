<?php

namespace App\Livewire\Admin\Company;

use App\Livewire\Traits\Alert;
use App\Models\CompanyInfo;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ProfileEdit extends Component
{
    use Alert;

    // Active Tab
    public string $activeTab = 'basic';

    // Company Info ID (singleton)
    public ?int $companyId = null;

    // Basic Information
    public ?string $company_name = null;

    public ?string $tagline = null;

    public ?int $established_year = null;

    // About & Vision
    public ?string $about_us = null;

    public ?string $vision = null;

    public array $mission = [];

    // Contact Information
    public ?string $address = null;

    public ?string $phone = null;

    public ?string $email = null;

    public ?string $whatsapp = null;

    // Mission item management
    public ?string $newMissionItem = null;

    public function mount(): void
    {
        $company = CompanyInfo::first();

        if ($company) {
            $this->companyId = $company->id;

            // Basic
            $this->company_name = $company->company_name;
            $this->tagline = $company->tagline;
            $this->established_year = $company->established_year;

            // About
            $this->about_us = $company->about_us;
            $this->vision = $company->vision;
            $this->mission = is_array($company->mission) ? $company->mission : [];

            // Contact
            $this->address = $company->address;
            $this->phone = $company->phone;
            $this->email = $company->email;
            $this->whatsapp = $company->whatsapp;
        }
    }

    public function render(): View
    {
        return view('livewire.admin.company.profile-edit');
    }

    public function rules(): array
    {
        return [
            // Basic
            'company_name' => ['required', 'string', 'max:200'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'established_year' => ['nullable', 'integer', 'min:1900', 'max:'.date('Y')],

            // About
            'about_us' => ['nullable', 'string'],
            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'array'],
            'mission.*' => ['string'],

            // Contact
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:100'],
            'whatsapp' => ['nullable', 'string', 'max:20'],
        ];
    }

    // Clean all data before validation
    protected function cleanData(): void
    {
        // Clean string fields - convert empty strings to null
        $stringFields = [
            'company_name', 'tagline', 'about_us', 'vision',
            'address', 'phone', 'email', 'whatsapp',
        ];

        foreach ($stringFields as $field) {
            if (is_string($this->$field) && trim($this->$field) === '') {
                $this->$field = null;
            } elseif (is_string($this->$field)) {
                $this->$field = trim($this->$field);
            }
        }
    }

    public function save(): void
    {
        // Clean all data first
        $this->cleanData();

        try {
            $validated = $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Get all validation errors
            $errors = $e->validator->errors();

            // Get first validation error message
            $firstError = $errors->first();

            $this->error('Validation Failed', $firstError);

            return;
        }

        try {
            // Get or create company info (singleton)
            $company = CompanyInfo::firstOrNew(['id' => $this->companyId]);

            // Clean up mission array (remove empty items)
            if (isset($validated['mission'])) {
                $validated['mission'] = array_values(array_filter($validated['mission'], fn ($item) => ! empty(trim($item))));
            }

            // Save data
            $company->fill($validated);
            $company->save();

            $this->companyId = $company->id;

            $this->success('Company profile updated successfully');

        } catch (\Exception $e) {
            $this->error('Save Failed', 'An error occurred while saving: '.$e->getMessage());

            // Log error for debugging
            \Log::error('Company profile save failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }

    // Add mission item
    public function addMissionItem(): void
    {
        if (! empty(trim($this->newMissionItem))) {
            $this->mission[] = trim($this->newMissionItem);
            $this->newMissionItem = null;
        }
    }

    // Remove mission item
    public function removeMissionItem(int $index): void
    {
        unset($this->mission[$index]);
        $this->mission = array_values($this->mission); // Re-index array
    }
}
