<?php

namespace app\Services;

interface BaseNewsletter
{
    public function subscribe(string $email);
}
