<?php

namespace Laratube\Listeners\Users;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserChannel
{

    public function handle($event)
    {
        //
        $event->user->channel()->create([
            //by default we give the name of the channel the users name
            'name' => $event->user->name,
        ]);
    }
}
