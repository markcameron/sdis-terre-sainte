<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormSubmission;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use A17\Twill\Facades\TwillAppSettings;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('site.contact', [
            'telephone' => TwillAppSettings::get('site-settings.address.phone_number'),
            'telephoneLink' => TwillAppSettings::get('site-settings.address.phone_number_link'),
            'email' => TwillAppSettings::get('site-settings.address.email_contact'),
            'address' => nl2br(TwillAppSettings::get('site-settings.address.address')),
        ]);
    }

    public function submit(ContactRequest $request)
    {
        Mail::to(collect([
            config('sdis.contact_mails.first'),
            config('sdis.contact_mails.second'),
        ])->filter())->send(new ContactFormSubmission($request->validated()));

        return redirect()->back()->with('success', 'Merci pour votre soumission!');
    }
}
