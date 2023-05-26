<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserCreatedNotification implements ShouldQueue
{
  use InteractsWithQueue;

  /**
   * Handle the event.
   *
   * @param  UserCreated  $event
   * @return void
   */
  public function handle(UserCreated $event)
  {
    \Illuminate\Support\Facades\Mail::to('testing@johnore.com')->send(new \App\Mail\UserCreatedMail($event->user));
  }
}
