<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\Auth\Login;
use App\Filament\Pages\Auth\Register;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use Filament\Navigation\NavigationItem;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\HtmlString;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->sidebarFullyCollapsibleOnDesktop(true)
            ->id('admin')
            ->breadcrumbs(false)
            ->path('admin')
            ->favicon(asset('images/kabupaten-sijunjung.png'))
            ->brandName('Infrastruktur TI')
            ->login(Login::class)
            ->registration(Register::class)
            ->navigationItems([
                NavigationItem::make('Lihat Website')
                    ->url('/', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->sort(-1),
            ])
            ->spa()
            // ->topNavigation()
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Zinc,
                'info' => Color::Blue,
                'primary' => Color::Amber,
                'success' => Color::Green,
                'warning' => Color::Yellow,

                // Warna tambahan yang menarik
                'purple' => Color::Purple,
                'indigo' => Color::Indigo,
                'cyan' => Color::Cyan,
                'emerald' => Color::Emerald,
                'teal' => Color::Teal,
                'orange' => Color::Orange,
                'rose' => Color::Rose,
                'pink' => Color::Pink,
                'sky' => Color::Sky,
                'lime' => Color::Lime,
                'fuchsia' => Color::Fuchsia,
                'violet' => Color::Violet,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->unsavedChangesAlerts()
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Master Data')
                    ->icon('heroicon-o-building-office')
                    ->collapsed(),

                NavigationGroup::make()
                    ->label('Data Infrastruktur')
                    ->icon('heroicon-o-folder-arrow-down')
                    ->collapsed(),

                NavigationGroup::make()
                    ->label('Data Potensi')
                    ->icon('heroicon-o-document-text')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Setting')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsed(),
            ])
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
            ->databaseNotifications()
            // ->databaseNotificationsPolling('30s')
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): HtmlString => new HtmlString('
                    <style>
                        /* Fix browser autofill & dark mode input text visibility */
                        .dark input:-webkit-autofill,
                        .dark input:-webkit-autofill:hover,
                        .dark input:-webkit-autofill:focus,
                        .dark input:-webkit-autofill:active {
                            -webkit-box-shadow: 0 0 0 1000px #1e293b inset !important;
                            -webkit-text-fill-color: #ffffff !important;
                            caret-color: #ffffff !important;
                            transition: background-color 5000s ease-in-out 0s;
                        }
                        .dark .fi-input-wrp input {
                            background-color: transparent !important;
                            color: #ffffff !important;
                        }
                        html:not(.dark) .fi-input-wrp input {
                            color: #111827 !important;
                        }
                    </style>
                ')
            )
            ->plugins([
                FilamentBackgroundsPlugin::make(),
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                \MarcoGermani87\FilamentCaptcha\FilamentCaptcha::make(),
            ]);
    }
}
