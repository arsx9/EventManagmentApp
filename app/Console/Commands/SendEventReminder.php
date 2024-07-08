<?php

namespace App\Console\Commands;

use App\Models\Attendee;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SendEventReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-event-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Event Notification to all the Event Attendees that event strat soon';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = \App\Models\Event::with('Attendees.user')
            ->whereBetween('start_time', [now(), now()->addDay()])
            ->get();

        $eventCount = $events->count();
        $eventLable = Str::plural('event', $eventCount);

        $events->each(
            fn ($event) => $event->attendees->each(
                fn ($attendee) => $this->info("Notifying the User {$attendee->user->id}")
            )
        );

        $this->info("Found {$eventCount} {$eventLable}.");
        $this->info('Reminder Notification Sent Successfully!');
    }
}
