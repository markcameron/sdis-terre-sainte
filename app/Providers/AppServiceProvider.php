<?php

namespace App\Providers;

use A17\Twill\Facades\TwillNavigation;
use A17\Twill\Facades\TwillAppSettings;
use Illuminate\Support\ServiceProvider;
use A17\Twill\Services\Settings\SettingsGroup;
use Illuminate\Database\Eloquent\Relations\Relation;
use A17\Twill\View\Components\Navigation\NavigationLink;

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
        TwillNavigation::addLink(
            NavigationLink::make()
                ->title('Features')
                ->forRoute('twill.featured.homepage'),
        );

        TwillNavigation::addLink(
            NavigationLink::make()
                ->title('Contenu')
                ->forRoute('twill.news.index')
                ->doNotAddSelfAsFirstChild()
                ->setChildren([
                    NavigationLink::make()->forModule('news'),
                    NavigationLink::make()->forModule('stats'),
                    NavigationLink::make()->forModule('emergencyNumbers'),
                    NavigationLink::make()->forModule('homepageHeroes'),
                    NavigationLink::make()->forModule('interventions'),
                    NavigationLink::make()->forModule('documents'),
                ])
        );

        TwillNavigation::addLink(
            NavigationLink::make()->forModule('stats')
        );

        TwillAppSettings::registerSettingsGroup(
            SettingsGroup::make()
                ->name('site-settings')
                ->label('Site settings')
        );

        Relation::morphMap([
            'stats' => 'App\Models\Stat',
            'emergencyNumbers' => 'App\Models\EmergencyNumber',
            'homepageHeroes' => 'App\Models\HomepageHero',
            'documents' => 'App\Models\Document',
            'pages' => 'App\Models\Page',
        ]);
    }
}
