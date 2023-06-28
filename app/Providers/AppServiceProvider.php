<?php

namespace App\Providers;

use BeyondCode\Mailbox\InboundEmail;
use App\Services\InterventionService;
use A17\Twill\Facades\TwillNavigation;
use A17\Twill\Facades\TwillAppSettings;
use BeyondCode\Mailbox\Facades\Mailbox;
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
                    NavigationLink::make()->forModule('pages'),
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
            'news' => 'App\Models\News',
        ]);

        Mailbox::subject('INFO MOBILISATION', function (InboundEmail $email) {
            resolve(InterventionService::class)->createFromEmail($email);
        });

        Mailbox::fallback(function (InboundEmail $email) {
            // Just log it in DB `mailbox_inbound_emails`
        });
    }
}
