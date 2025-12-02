<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $company = \App\Models\CompanyInfo::first();
        $socialMedia = \App\Models\SocialMedia::where('is_active', true)
            ->orderBy('display_order')
            ->take(4)
            ->get();

        $iconMap = [
            'facebook' => 'fab fa-facebook-f',
            'instagram' => 'fab fa-instagram',
            'linkedin' => 'fab fa-linkedin-in',
            'twitter' => 'fab fa-twitter',
            'youtube' => 'fab fa-youtube',
            'whatsapp' => 'fab fa-whatsapp',
        ];

        view()->share(compact('company', 'socialMedia', 'iconMap'));
    }
}
