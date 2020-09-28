<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifiAdminViaSlack
{
    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        // Slack notification to Admin
        dump('Slack message here.');
    }
}
