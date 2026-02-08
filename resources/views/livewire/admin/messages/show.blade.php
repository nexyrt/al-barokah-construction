<div>
    <x-modal wire="modal" size="2xl" center persistent>
        <x-slot:title>
            <div class="flex items-center gap-4 my-3">
                <div
                    class="h-12 w-12 bg-primary-50 dark:bg-primary-900/20 rounded-xl flex items-center justify-center">
                    <x-icon name="envelope-open" class="w-6 h-6 text-primary-600 dark:text-primary-400" />
                </div>
                <div>
                    <h3 class="text-xl font-bold text-zinc-900 dark:text-zinc-50">{{ $subject }}</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">{{ $createdAt }}</p>
                </div>
            </div>
        </x-slot:title>

        <div class="space-y-6">
            {{-- Sender Info Section --}}
            <div class="space-y-4">
                <div class="border-b border-zinc-200 dark:border-zinc-600 pb-4">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 mb-1">Informasi Pengirim</h4>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Detail kontak pengirim pesan</p>
                </div>

                <div class="bg-zinc-50 dark:bg-zinc-800/50 rounded-xl p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <div class="text-xs text-zinc-500 dark:text-zinc-400 uppercase tracking-wide mb-1">Nama
                            </div>
                            <div class="font-medium text-zinc-900 dark:text-zinc-50">{{ $name }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-zinc-500 dark:text-zinc-400 uppercase tracking-wide mb-1">Telepon
                            </div>
                            <div class="font-medium text-zinc-900 dark:text-zinc-50">
                                <a href="tel:{{ $phone }}"
                                    class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    {{ $phone }}
                                </a>
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <div class="text-xs text-zinc-500 dark:text-zinc-400 uppercase tracking-wide mb-1">Email
                            </div>
                            <div class="font-medium text-zinc-900 dark:text-zinc-50">
                                <a href="mailto:{{ $email }}"
                                    class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    {{ $email }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Message Content Section --}}
            <div class="space-y-4">
                <div class="border-b border-zinc-200 dark:border-zinc-600 pb-4">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 mb-1">Isi Pesan</h4>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Pesan yang dikirim oleh {{ $name }}</p>
                </div>

                <div
                    class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-4 text-zinc-700 dark:text-zinc-300 whitespace-pre-wrap leading-relaxed">
                    {{ $messageContent }}
                </div>
            </div>
        </div>

        <x-slot:footer>
            <div class="flex flex-col sm:flex-row justify-between gap-3 w-full">
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2">
                    <a href="mailto:{{ $email }}?subject=Re: {{ $subject }}"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm font-medium transition-colors">
                        <x-icon name="paper-airplane" class="w-4 h-4" />
                        Balas Email
                    </a>
                    @if ($phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $phone) }}" target="_blank"
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-medium transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            WhatsApp
                        </a>
                    @endif
                </div>
                <x-button wire:click="close" color="zinc" class="w-full sm:w-auto">
                    Tutup
                </x-button>
            </div>
        </x-slot:footer>
    </x-modal>
</div>
