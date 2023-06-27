<?php

namespace App\View\Components\Blade;

use Illuminate\View\Component;
use A17\Twill\Facades\TwillAppSettings;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blade.footer', [
            'telephone' => TwillAppSettings::get('site-settings.address.phone_number'),
            'telephoneLink' => TwillAppSettings::get('site-settings.address.phone_number_link'),
            'email' => TwillAppSettings::get('site-settings.address.email_contact'),
            'address' => nl2br(TwillAppSettings::get('site-settings.address.address')),
            'facebookUrl' => TwillAppSettings::get('site-settings.social.url_facebook'),
            'githubUrl' => TwillAppSettings::get('site-settings.social.url_github'),
        ]);
    }
}
