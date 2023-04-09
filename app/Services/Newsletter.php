<?php

declare(strict_types=1);

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email)
    {
        $this->getClient()->lists->addListMember(config('services.mailchimp.list.subscribe'), [
            'email_address' => $email,
            'status' => 'pending',
        ]);
    }

    public function getClient()
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5',
        ]);

        return $mailchimp;
    }
}
