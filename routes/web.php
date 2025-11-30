<?php

use App\Http\Controllers\BusinessFieldController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Livewire\ContactPage;
use App\Livewire\ProjectIndex;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
// Import Controllers
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
// Import Livewire Components
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// ============================================
// PUBLIC ROUTES
// ============================================

// Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Portofolio/Proyek (Livewire)
Route::get('/proyek', ProjectIndex::class)->name('projects.index');

// Detail Proyek (Blade)
Route::get('/proyek/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Bidang Usaha
Route::get('/bidang-usaha', [BusinessFieldController::class, 'index'])->name('business-fields.index');

// Profil Perusahaan
Route::get('/profil', [CompanyController::class, 'index'])->name('company.profile');

// Kontak (Livewire)
// Route::get('/kontak', ContactPage::class)->name('contact');

// Sitemap Route
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();

    // Static Pages
    $sitemap->add(
        Url::create('/')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0)
    );

    $sitemap->add(
        Url::create('/profil')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8)
    );

    $sitemap->add(
        Url::create('/bidang-usaha')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8)
    );

    $sitemap->add(
        Url::create('/proyek')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setPriority(0.9)
    );

    $sitemap->add(
        Url::create('/kontak')
            ->setLastModificationDate(now())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.7)
    );

    // Dynamic Pages - All Published Projects
    \App\Models\Project::where('is_published', true)
        ->latest('updated_at')
        ->get()
        ->each(function ($project) use ($sitemap) {
            $sitemap->add(
                Url::create("/proyek/{$project->slug}")
                    ->setLastModificationDate($project->updated_at)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.6)
            );
        });

    return $sitemap->toResponse(request());
})->name('sitemap');

// ============================================
// AUTHENTICATED ROUTES
// ============================================

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
