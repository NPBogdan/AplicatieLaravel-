<?php

namespace App\Providers;

use App\Models\Attribute;
use App\Models\Notification;
use App\Models\Tool;
use App\Policies\AttributePolicy;
use App\Policies\NotificationPolicy;
use App\Policies\ToolPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Tool::class => ToolPolicy::class,
        Attribute::class => AttributePolicy::class,
        Notification::class => NotificationPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
