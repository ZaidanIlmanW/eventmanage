<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\Middleware\SyncSpatiePermissionsWithFilamentTenants;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel

         // Default konfigurasi
         ->default()

            // Tetapkan ID unik untuk panel
            ->id('admin') 

            // Tetapkan path untuk panel admin
            ->path('admin')

            ->login()

            // Plugin yang digunakan
          ->plugin(FilamentSpatieRolesPermissionsPlugin::make())

           

            // Konfigurasi warna
            ->colors([
                'primary' => Color::Amber,
            ])

            // Menemukan resource dan halaman secara otomatis
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')

            // Halaman yang digunakan
            ->pages([
                Pages\Dashboard::class,
            ])

            // Menemukan widget secara otomatis
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')

            // Widget yang digunakan
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])

            // Middleware untuk panel admin
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])

            // Middleware khusus tenant
            ->tenantMiddleware([
                SyncSpatiePermissionsWithFilamentTenants::class,
            ], isPersistent: true)
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())

            // Middleware untuk otentikasi
           ->authMiddleware([
            Authenticate::class, // Middleware untuk memastikan pengguna login
            
    
           ]);

           
    }
}
