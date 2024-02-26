<?php

namespace App\Actions\Newsletter;

use App\Models\Subscriber;

class EmailsubscriberAction
{
    public function __invoke(array $formData)
    {
        $this->getOrCreateSubscriberEmail($formData);
    }

    private function getOrCreateSubscriberEmail(array $formData)
    {
        return Subscriber::firstOrCreate($formData);
    }
}
