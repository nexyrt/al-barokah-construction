<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1
                class="text-4xl font-bold bg-gradient-to-r from-zinc-900 via-primary-800 to-primary-800 dark:from-white dark:via-primary-200 dark:to-primary-200 bg-clip-text text-transparent">
                Legal & Structure
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400 text-lg">
                Manage legal documents, certifications, awards, and organizational structure
            </p>
        </div>

        {{-- Desktop Save Button --}}
        <div class="hidden sm:block">
            <x-button wire:click="save" color="primary" icon="check" loading="save" class="whitespace-nowrap">
                Save Changes
            </x-button>
        </div>
    </div>

    {{-- Tab Navigation --}}
    <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 overflow-hidden">
        <div class="flex border-b border-zinc-200 dark:border-zinc-700 overflow-x-auto">
            {{-- Tab 1: Legal Documents --}}
            <button type="button" wire:click="$set('activeTab', 'documents')"
                class="flex items-center gap-2 px-4 sm:px-6 py-4 whitespace-nowrap transition-colors {{ $activeTab === 'documents' ? 'bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 border-b-2 border-primary-600' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                <x-icon name="document-text" class="w-5 h-5" />
                <span class="hidden sm:inline">Legal Documents</span>
                <span class="sm:hidden">Documents</span>
            </button>

            {{-- Tab 2: Certifications --}}
            <button type="button" wire:click="$set('activeTab', 'certifications')"
                class="flex items-center gap-2 px-4 sm:px-6 py-4 whitespace-nowrap transition-colors {{ $activeTab === 'certifications' ? 'bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 border-b-2 border-primary-600' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                <x-icon name="shield-check" class="w-5 h-5" />
                <span class="hidden sm:inline">Certifications</span>
                <span class="sm:hidden">Certs</span>
            </button>

            {{-- Tab 3: Organization --}}
            <button type="button" wire:click="$set('activeTab', 'organization')"
                class="flex items-center gap-2 px-4 sm:px-6 py-4 whitespace-nowrap transition-colors {{ $activeTab === 'organization' ? 'bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 border-b-2 border-primary-600' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                <x-icon name="users" class="w-5 h-5" />
                <span class="hidden sm:inline">Organization</span>
                <span class="sm:hidden">Org</span>
            </button>
        </div>
    </div>

    {{-- Tab Content --}}
    <div class="space-y-6">

        {{-- Tab 1: Legal Documents --}}
        <div x-show="$wire.activeTab === 'documents'" x-cloak
            class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6 space-y-6">

            <div class="border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Legal Documents</h3>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Enter company legal document numbers</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- NIB --}}
                <x-input wire:model="nib" label="NIB (Nomor Induk Berusaha)" placeholder="e.g., 1234567890123456"
                    hint="16-digit business identification number" />

                {{-- SIUJK --}}
                <x-input wire:model="siujk" label="SIUJK" placeholder="e.g., 1.23456.7.89.0.1.2.34567"
                    hint="Construction business license number" />

                {{-- TDP --}}
                <x-input wire:model="tdp" label="TDP (Tanda Daftar Perusahaan)" placeholder="e.g., 123456789012345"
                    hint="Company registration mark" />

                {{-- Akta Pendirian --}}
                <x-input wire:model="akta_pendirian" label="Akta Pendirian"
                    placeholder="e.g., No. 12 Tgl 15 Jan 2020 - Notaris Ahmad" hint="Deed of establishment" />

                {{-- SK Kemenkumham --}}
                <x-input wire:model="sk_kemenkumham" label="SK Kemenkumham"
                    placeholder="e.g., AHU-1234567.AH.01.01.Tahun 2020" hint="Ministry decree number" />

                {{-- Domisili Usaha --}}
                <x-input wire:model="domisili_usaha" label="Domisili Usaha" placeholder="e.g., 503/123/DPMPTSP/2020"
                    hint="Business domicile certificate" />
            </div>
        </div>
        {{-- Tab 2: Certifications --}}
        <div x-show="$wire.activeTab === 'certifications'" x-cloak
            class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6 space-y-6">

            <div class="border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Certifications</h3>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Manage company certifications and licenses</p>
            </div>

            {{-- Existing Certifications List --}}
            @if (count($certifications) > 0)
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-zinc-700 dark:text-zinc-300">Current Certifications
                        ({{ count($certifications) }})</h4>

                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($certifications as $index => $cert)
                            <div
                                class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-1 space-y-2">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0">
                                                <x-icon name="shield-check" class="w-6 h-6 text-primary-600" />
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-semibold text-zinc-900 dark:text-zinc-50">
                                                    {{ $cert['name'] ?? 'No Name' }}
                                                </h5>
                                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                                    Certificate No: <span
                                                        class="font-medium">{{ $cert['number'] ?? '-' }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm pl-9">
                                            @if (!empty($cert['issued_by']))
                                                <div>
                                                    <span class="text-zinc-500 dark:text-zinc-400">Issued by:</span>
                                                    <span
                                                        class="text-zinc-900 dark:text-zinc-50 font-medium">{{ $cert['issued_by'] }}</span>
                                                </div>
                                            @endif

                                            @if (!empty($cert['issued_date']))
                                                <div>
                                                    <span class="text-zinc-500 dark:text-zinc-400">Issued:</span>
                                                    <span
                                                        class="text-zinc-900 dark:text-zinc-50 font-medium">{{ $cert['issued_date'] }}</span>
                                                </div>
                                            @endif

                                            @if (!empty($cert['expired_date']))
                                                <div>
                                                    <span class="text-zinc-500 dark:text-zinc-400">Expires:</span>
                                                    <span
                                                        class="text-zinc-900 dark:text-zinc-50 font-medium">{{ $cert['expired_date'] }}</span>
                                                </div>
                                            @endif
                                        </div>

                                        @if (!empty($cert['file_path']))
                                            <div class="pl-9">
                                                <a href="{{ \Storage::url($cert['file_path']) }}" target="_blank"
                                                    class="inline-flex items-center gap-1 text-xs text-primary-600 hover:text-primary-700 dark:text-primary-400">
                                                    <x-icon name="document" class="w-4 h-4" />
                                                    View Certificate
                                                </a>
                                            </div>
                                        @endif
                                    </div>

                                    <x-button.circle wire:click="removeCertification({{ $index }})"
                                        icon="trash" color="red" size="sm" title="Remove" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Add New Certification Form --}}
            <div class="border-t border-zinc-200 dark:border-zinc-700 pt-6">
                <h4 class="text-sm font-semibold text-zinc-700 dark:text-zinc-300 mb-4">Add New Certification</h4>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <x-input wire:model="newCertification.name" label="Certification Name *"
                            placeholder="e.g., ISO 9001:2015" />

                        <x-input wire:model="newCertification.number" label="Certificate Number *"
                            placeholder="e.g., CERT-2024-001" />

                        <x-input wire:model="newCertification.issued_by" label="Issued By"
                            placeholder="e.g., International Organization" />

                        <x-date wire:model="newCertification.issued_date" label="Issued Date"
                            placeholder="Select date" />

                        <x-date wire:model="newCertification.expired_date" label="Expiry Date"
                            placeholder="Select date" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                            Certificate Document (Optional)
                        </label>
                        <x-upload wire:model="newCertification.file_path" accept="application/pdf"
                            hint="PDF only, max 5MB" />
                    </div>

                    <div class="flex justify-end">
                        <x-button wire:click="addCertification" color="primary" icon="plus"
                            loading="addCertification">
                            Add Certification
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Tab 3: Organization Structure --}}
        <div x-show="$wire.activeTab === 'organization'" x-cloak
            class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6 space-y-8">

            <div class="border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Organization Structure</h3>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Manage board of commissioners, directors, and
                    management team</p>
            </div>

            {{-- Board of Commissioners --}}
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-base font-semibold text-zinc-900 dark:text-zinc-50">Board of Commissioners</h4>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">Company commissioners</p>
                    </div>
                    <span
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400">{{ count($board_of_commissioners) }}
                        members</span>
                </div>

                {{-- Current Commissioners --}}
                @if (count($board_of_commissioners) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($board_of_commissioners as $index => $member)
                            <div
                                class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700">
                                <div class="flex flex-col items-center text-center space-y-3">
                                    {{-- Photo --}}
                                    @if (!empty($member['photo']))
                                        <div class="w-20 h-20 rounded-full overflow-hidden bg-white dark:bg-zinc-700">
                                            <img src="{{ \Storage::url($member['photo']) }}"
                                                alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div
                                            class="w-20 h-20 rounded-full bg-primary-100 dark:bg-primary-900/20 flex items-center justify-center">
                                            <x-icon name="user"
                                                class="w-10 h-10 text-primary-600 dark:text-primary-400" />
                                        </div>
                                    @endif

                                    {{-- Info --}}
                                    <div class="flex-1">
                                        <h5 class="font-semibold text-zinc-900 dark:text-zinc-50">
                                            {{ $member['name'] }}</h5>
                                        <p class="text-sm text-zinc-600 dark:text-zinc-400">{{ $member['position'] }}
                                        </p>
                                    </div>

                                    {{-- Remove Button --}}
                                    <x-button wire:click="removeCommissioner({{ $index }})" color="red"
                                        size="sm" outline icon="trash" class="w-full">
                                        Remove
                                    </x-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Add Form --}}
                <div
                    class="p-4 bg-primary-50 dark:bg-primary-900/10 rounded-lg border border-primary-200 dark:border-primary-800">
                    <p class="text-sm font-medium text-primary-900 dark:text-primary-100 mb-3">Add New Commissioner</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <x-input wire:model="newCommissioner.name" placeholder="Full Name *" />
                        <x-input wire:model="newCommissioner.position" placeholder="Position *" />
                    </div>
                    <div class="mt-3">
                        <x-upload wire:model="newCommissioner.photo" accept="image/*" hint="Photo (optional)" />
                    </div>
                    <div class="flex justify-end mt-3">
                        <x-button wire:click="addCommissioner" color="primary" size="sm" icon="plus"
                            loading="addCommissioner">
                            Add Commissioner
                        </x-button>
                    </div>
                </div>
            </div>

            {{-- Board of Directors --}}
            <div class="space-y-4 border-t border-zinc-200 dark:border-zinc-700 pt-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-base font-semibold text-zinc-900 dark:text-zinc-50">Board of Directors</h4>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">Company directors</p>
                    </div>
                    <span
                        class="text-sm font-medium text-zinc-500 dark:text-zinc-400">{{ count($board_of_directors) }}
                        members</span>
                </div>

                {{-- Current Directors --}}
                @if (count($board_of_directors) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($board_of_directors as $index => $member)
                            <div
                                class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700">
                                <div class="flex flex-col items-center text-center space-y-3">
                                    {{-- Photo --}}
                                    @if (!empty($member['photo']))
                                        <div class="w-20 h-20 rounded-full overflow-hidden bg-white dark:bg-zinc-700">
                                            <img src="{{ \Storage::url($member['photo']) }}"
                                                alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div
                                            class="w-20 h-20 rounded-full bg-primary-100 dark:bg-primary-900/20 flex items-center justify-center">
                                            <x-icon name="user"
                                                class="w-10 h-10 text-primary-600 dark:text-primary-400" />
                                        </div>
                                    @endif

                                    {{-- Info --}}
                                    <div class="flex-1">
                                        <h5 class="font-semibold text-zinc-900 dark:text-zinc-50">
                                            {{ $member['name'] }}</h5>
                                        <p class="text-sm text-zinc-600 dark:text-zinc-400">{{ $member['position'] }}
                                        </p>
                                    </div>

                                    {{-- Remove Button --}}
                                    <x-button wire:click="removeDirector({{ $index }})" color="red"
                                        size="sm" outline icon="trash" class="w-full">
                                        Remove
                                    </x-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Add Form --}}
                <div
                    class="p-4 bg-primary-50 dark:bg-primary-900/10 rounded-lg border border-primary-200 dark:border-primary-800">
                    <p class="text-sm font-medium text-primary-900 dark:text-primary-100 mb-3">Add New Director</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <x-input wire:model="newDirector.name" placeholder="Full Name *" />
                        <x-input wire:model="newDirector.position" placeholder="Position *" />
                    </div>
                    <div class="mt-3">
                        <x-upload wire:model="newDirector.photo" accept="image/*" hint="Photo (optional)" />
                    </div>
                    <div class="flex justify-end mt-3">
                        <x-button wire:click="addDirector" color="primary" size="sm" icon="plus"
                            loading="addDirector">
                            Add Director
                        </x-button>
                    </div>
                </div>
            </div>

            {{-- Management Team --}}
            <div class="space-y-4 border-t border-zinc-200 dark:border-zinc-700 pt-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-base font-semibold text-zinc-900 dark:text-zinc-50">Management Team</h4>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400">Key managers and executives</p>
                    </div>
                    <span class="text-sm font-medium text-zinc-500 dark:text-zinc-400">{{ count($management_team) }}
                        members</span>
                </div>

                {{-- Current Managers --}}
                @if (count($management_team) > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($management_team as $index => $member)
                            <div
                                class="p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700">
                                <div class="flex flex-col items-center text-center space-y-3">
                                    {{-- Photo --}}
                                    @if (!empty($member['photo']))
                                        <div class="w-20 h-20 rounded-full overflow-hidden bg-white dark:bg-zinc-700">
                                            <img src="{{ \Storage::url($member['photo']) }}"
                                                alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div
                                            class="w-20 h-20 rounded-full bg-primary-100 dark:bg-primary-900/20 flex items-center justify-center">
                                            <x-icon name="user"
                                                class="w-10 h-10 text-primary-600 dark:text-primary-400" />
                                        </div>
                                    @endif

                                    {{-- Info --}}
                                    <div class="flex-1">
                                        <h5 class="font-semibold text-zinc-900 dark:text-zinc-50">
                                            {{ $member['name'] }}</h5>
                                        <p class="text-sm text-zinc-600 dark:text-zinc-400">{{ $member['position'] }}
                                        </p>
                                    </div>

                                    {{-- Remove Button --}}
                                    <x-button wire:click="removeManager({{ $index }})" color="red"
                                        size="sm" outline icon="trash" class="w-full">
                                        Remove
                                    </x-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Add Form --}}
                <div
                    class="p-4 bg-primary-50 dark:bg-primary-900/10 rounded-lg border border-primary-200 dark:border-primary-800">
                    <p class="text-sm font-medium text-primary-900 dark:text-primary-100 mb-3">Add New Manager</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <x-input wire:model="newManager.name" placeholder="Full Name *" />
                        <x-input wire:model="newManager.position" placeholder="Position *" />
                    </div>
                    <div class="mt-3">
                        <x-upload wire:model="newManager.photo" accept="image/*" hint="Photo (optional)" />
                    </div>
                    <div class="flex justify-end mt-3">
                        <x-button wire:click="addManager" color="primary" size="sm" icon="plus"
                            loading="addManager">
                            Add Manager
                        </x-button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Sticky Save Button (Mobile) --}}
    <div class="sm:hidden fixed bottom-4 left-4 right-4 z-50">
        <x-button wire:click="save" color="primary" icon="check" loading="save" class="w-full shadow-lg">
            Save Changes
        </x-button>
    </div>
</div>
