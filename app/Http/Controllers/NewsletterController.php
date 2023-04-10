<?php

namespace App\Http\Controllers;

use app\Services\BaseNewsletter;

class NewsletterController extends Controller
{
    public function __invoke(BaseNewsletter $newsletter)
    {
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'Your email address cannot added to our newsletter']);
        }

        return redirect('/posts')->with('success', 'Your email has added to our newsletter.');
    }
}
