<?php

namespace App\Livewire\Admin\Company;

use App\Livewire\Traits\Alert;
use App\Models\CompanyLegalData;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class LegalEdit extends Component
{
    use Alert, WithFileUploads;

    public string $activeTab = 'documents';
    public ?int $legalDataId = null;

    // Tab 1: Legal Documents - TEXT INPUTS
    public ?string $nib = null;
    public ?string $siujk = null;
    public ?string $tdp = null;
    public ?string $akta_pendirian = null;
    public ?string $sk_kemenkumham = null;
    public ?string $domisili_usaha = null;

    // Tab 2: Certifications
    public array $certifications = [];
    public array $newCertification = [
        'type' => '',
        'name' => '',
        'number' => '',
        'issued_by' => '',
        'issued_date' => '',
        'expired_date' => '',
    ];

    // Tab 3: Organization
    public array $board_of_commissioners = [];
    public array $board_of_directors = [];
    public array $management_team = [];
    public array $newCommissioner = ['name' => '', 'position' => '', 'photo' => null];
    public array $newDirector = ['name' => '', 'position' => '', 'photo' => null];
    public array $newManager = ['name' => '', 'position' => '', 'photo' => null];

    public function mount(): void
    {
        $legalData = CompanyLegalData::first();

        if ($legalData) {
            $this->legalDataId = $legalData->id;
            $this->nib = $legalData->nib;
            $this->siujk = $legalData->siujk;
            $this->tdp = $legalData->tdp;
            $this->akta_pendirian = $legalData->akta_pendirian;
            $this->sk_kemenkumham = $legalData->sk_kemenkumham;
            $this->domisili_usaha = $legalData->domisili_usaha;
            $this->certifications = is_array($legalData->certifications) ? $legalData->certifications : [];
            $this->board_of_commissioners = is_array($legalData->board_of_commissioners) ? $legalData->board_of_commissioners : [];
            $this->board_of_directors = is_array($legalData->board_of_directors) ? $legalData->board_of_directors : [];
            $this->management_team = is_array($legalData->management_team) ? $legalData->management_team : [];
        }
    }

    public function render(): View
    {
        return view('livewire.admin.company.legal-edit');
    }

    public function rules(): array
    {
        return [
            'nib' => ['nullable', 'string', 'max:100'],
            'siujk' => ['nullable', 'string', 'max:100'],
            'tdp' => ['nullable', 'string', 'max:100'],
            'akta_pendirian' => ['nullable', 'string', 'max:255'],
            'sk_kemenkumham' => ['nullable', 'string', 'max:255'],
            'domisili_usaha' => ['nullable', 'string', 'max:255'],
            'certifications' => ['nullable', 'array'],
            'board_of_commissioners' => ['nullable', 'array'],
            'board_of_directors' => ['nullable', 'array'],
            'management_team' => ['nullable', 'array'],
        ];
    }

    public function save(): void
    {
        try {
            $validated = $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->error('Validation Failed', $e->validator->errors()->first());
            return;
        }

        try {
            $legalData = CompanyLegalData::firstOrNew(['id' => $this->legalDataId]);
            $validated['certifications'] = $this->certifications;
            $validated['board_of_commissioners'] = $this->board_of_commissioners;
            $validated['board_of_directors'] = $this->board_of_directors;
            $validated['management_team'] = $this->management_team;

            $legalData->fill($validated);
            $legalData->save();

            $this->legalDataId = $legalData->id;
            $this->success('Legal data updated successfully');
        } catch (\Exception $e) {
            $this->error('Save Failed', $e->getMessage());
            \Log::error('Company legal data save failed', ['error' => $e->getMessage()]);
        }
    }

    public function addCertification(): void
    {
        if (empty($this->newCertification['name']) || empty($this->newCertification['number'])) {
            $this->error('Validation Failed', 'Name and number are required');
            return;
        }

        $this->certifications[] = $this->newCertification;
        $this->newCertification = ['type' => '', 'name' => '', 'number' => '', 'issued_by' => '', 'issued_date' => '', 'expired_date' => ''];
        $this->success('Certification added. Click Save to persist.');
    }

    public function removeCertification(int $index): void
    {
        unset($this->certifications[$index]);
        $this->certifications = array_values($this->certifications);
        $this->success('Certification removed. Click Save to persist.');
    }

    public function addCommissioner(): void
    {
        if (empty($this->newCommissioner['name']) || empty($this->newCommissioner['position'])) {
            $this->error('Validation Failed', 'Name and position are required');
            return;
        }
        $this->board_of_commissioners[] = $this->newCommissioner;
        $this->newCommissioner = ['name' => '', 'position' => '', 'photo' => null];
        $this->success('Commissioner added. Click Save to persist.');
    }

    public function removeCommissioner(int $index): void
    {
        unset($this->board_of_commissioners[$index]);
        $this->board_of_commissioners = array_values($this->board_of_commissioners);
        $this->success('Commissioner removed. Click Save to persist.');
    }

    public function addDirector(): void
    {
        if (empty($this->newDirector['name']) || empty($this->newDirector['position'])) {
            $this->error('Validation Failed', 'Name and position are required');
            return;
        }
        $this->board_of_directors[] = $this->newDirector;
        $this->newDirector = ['name' => '', 'position' => '', 'photo' => null];
        $this->success('Director added. Click Save to persist.');
    }

    public function removeDirector(int $index): void
    {
        unset($this->board_of_directors[$index]);
        $this->board_of_directors = array_values($this->board_of_directors);
        $this->success('Director removed. Click Save to persist.');
    }

    public function addManager(): void
    {
        if (empty($this->newManager['name']) || empty($this->newManager['position'])) {
            $this->error('Validation Failed', 'Name and position are required');
            return;
        }
        $this->management_team[] = $this->newManager;
        $this->newManager = ['name' => '', 'position' => '', 'photo' => null];
        $this->success('Manager added. Click Save to persist.');
    }

    public function removeManager(int $index): void
    {
        unset($this->management_team[$index]);
        $this->management_team = array_values($this->management_team);
        $this->success('Manager removed. Click Save to persist.');
    }
}