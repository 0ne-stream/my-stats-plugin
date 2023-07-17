<?php

namespace Acme\MyStats\Subscribers;

use App\Events\LoginSuccessEvent;
use App\Events\LoginFailedEvent;

class SecurityEventSubscriber
{
    public function handleSecurityEvent(object $event)
    {
        // do something
    }

    public function subscribe($events)
    {
        $events->listen(LoginSuccessEvent::class, [SecurityEventSubscriber::class, 'handleSecurityEvent']);
        $events->listen(LoginFailedEvent::class, [SecurityEventSubscriber::class, 'handleSecurityEvent']);
    }
}
