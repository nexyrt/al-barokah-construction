<?php

use App\Http\Controllers\BusinessFieldController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyDataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Livewire\ProjectIndex;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// ============================================
// PUBLIC ROUTES
// ============================================

Route::get('/', [HomeController::class, 'index'])->name('home');

// Projects (Public)
Route::get('/proyek', ProjectIndex::class)->name('projects.index');
Route::get('/proyek/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Business Fields
Route::get('/bidang-usaha', [BusinessFieldController::class, 'index'])->name('business-fields.index');
Route::get('/bidang-usaha/{slug}', [BusinessFieldController::class, 'show'])->name('business-fields.show');

// Company
Route::get('/profil', [CompanyController::class, 'index'])->name('company.profile');
Route::get('/data-perusahaan', [CompanyDataController::class, 'index'])->name('company.data');

// Contact
Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'submit'])->name('contact.submit');

// Sitemap
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create();

    // Static Pages
    $sitemap->add(Url::create('/')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setPriority(1.0));
    $sitemap->add(Url::create('/profil')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8));
    $sitemap->add(Url::create('/bidang-usaha')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8));
    $sitemap->add(Url::create('/proyek')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)->setPriority(0.9));
    $sitemap->add(Url::create('/kontak')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.7));

    // Dynamic Pages - Projects
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
// ADMIN ROUTES (Authenticated)
// ============================================

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Projects
    Route::get('/projects', \App\Livewire\Admin\Projects\Index::class)->name('projects.index');
    Route::get('/projects/create', \App\Livewire\Admin\Projects\Create::class)->name('projects.create');
    Route::get('/projects/{project}/edit', \App\Livewire\Admin\Projects\Edit::class)->name('projects.edit');

    // Route::get('/projects/create', \App\Livewire\Admin\Projects\Create::class)->name('projects.create');
    // Route::get('/projects/{project}/edit', \App\Livewire\Admin\Projects\Edit::class)->name('projects.edit');

    // Business Fields
    Route::get('/business-fields', \App\Livewire\Admin\BusinessFields\Index::class)->name('business-fields.index');

    // Tags (Coming Soon)
    Route::get('/tags', \App\Livewire\Admin\Tags\Index::class)->name('tags.index');

    // Company (Coming Soon)
    Route::get('/company', \App\Livewire\Admin\Company\ProfileEdit::class)->name('company.edit');
    Route::get('/company/legal', \App\Livewire\Admin\Company\LegalEdit::class)->name('company.legal.edit');

    // Clients
    Route::get('/clients', \App\Livewire\Admin\Clients\Index::class)->name('clients.index');

    // Messages (Coming Soon)
    // Route::get('/messages', \App\Livewire\Admin\Messages\Index::class)->name('messages.index');

    // Users (Coming Soon)
    // Route::get('/users', \App\Livewire\Admin\Users\Index::class)->name('users.index');
});

// ============================================
// SETTINGS ROUTES
// ============================================

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