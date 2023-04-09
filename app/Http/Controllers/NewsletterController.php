<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'Your email address cannot added to our newsletter']);
        }

        return redirect('/posts')->with('success', 'Your email has added to our newsletter.');
    }
}
