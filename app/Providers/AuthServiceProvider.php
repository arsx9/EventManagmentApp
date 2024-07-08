<?php

namespace App\Providers;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //if you are following laravel default convention don't need to define here anything
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //As we hbve created policied so don't neeed this for now
        // Gate::define('update-event', function ($user, Event $event) {
        //     return $user->id === $event->user_id;
        // });
        // Gate::define('delete-attendee', function ($user, Event $event, Attendee $attendee) {
        //     return $user->id === $event->user_id ||
        //         $user->id === $attendee->user_id;
        // });
    }
}
