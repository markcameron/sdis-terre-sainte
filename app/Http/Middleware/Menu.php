<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Navigation\Facades\Navigation;
use Spatie\Navigation\Section;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Navigation::make()
            ->add('Le SDIS', url('presentation'))
            // , function (Section $section) {
            //     $section
            //         ->add('Présentation', route('homepage'))
            //         ->add('Véhicules', route('homepage'));
            // })
            ->add('Documents', route('documents'))
            ->add('Devenir Sapeur Pompier', 'devenir-sapeur-pompier')
            ->add('Contact', route('contact.index'));

        return $next($request);
    }
}
