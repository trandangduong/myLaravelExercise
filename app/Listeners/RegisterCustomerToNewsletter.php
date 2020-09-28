<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterCustomerToNewsletter
{
    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        // Register to Newsletter
        dump('Registered to newsletter');
    }
}
