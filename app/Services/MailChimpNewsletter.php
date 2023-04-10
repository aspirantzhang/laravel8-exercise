<?php

declare(strict_types=1);

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailChimpNewsletter implements BaseNewsletter
{
    public function __construct(protected ApiClient $client)
    {
    }

    public function subscribe(string $email, $listName = null)
    {
        $listName ??= config('services.mailchimp.list.subscribe');
        $this->client->lists->addListMember($listName, [
            'email_address' => $email,
            'status' => 'pending',
        ]);
    }
}
