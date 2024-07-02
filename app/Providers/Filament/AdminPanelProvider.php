<?php

namespace App\Providers\Filament;

use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\FontFamily;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('init')
            ->path('/admin')
            ->login()
            ->spa()
            ->profile()
            ->passwordReset()
            ->emailVerification()
            ->brandLogo(asset('logo.png'))
            ->colors([
                'primary' => '#ff1515',
            ])
            ->brandName('Init')
            ->brandLogoHeight('50px')
            ->favicon(asset('logo.png'))

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->sidebarCollapsibleOnDesktop()
//            ->userMenuItems([
//                'profile' => MenuItem::make()->url(fn (): string => EditProfile::getUrl())
//            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->font(
                'Gilroy',
            )
//            ->navigationGroups([
//                NavigationGroup::make()
//                        ->label('Настройка')
//                        ->icon('heroicon-o-cog-6-tooth'),
//                NavigationGroup::make()
//                    ->label('Задачи и проекты')
//                    ->icon('heroicon-o-rectangle-stack'),
//                NavigationGroup::make()
//                    ->label('Документы и отчеты')
//                    ->icon('heroicon-o-document-text')
//                    ->collapsed(),
//                NavigationGroup::make()
//                    ->label('Плаижи и счета')
//                    ->icon('heroicon-o-currency-dollar')
//                    ->collapsed(),
//            ])
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
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
            ])
            ->defaultThemeMode(ThemeMode::Light);
    }
}
