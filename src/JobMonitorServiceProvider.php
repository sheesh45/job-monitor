<?php

namespace JobMonitor;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobFailed;
use JobMonitor\Listeners\JobStartedListener;
use JobMonitor\Listeners\JobSucceededListener;
use JobMonitor\Listeners\JobFailedListener;

class JobMonitorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'job-monitor');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/job-monitor'),
        ], 'job-monitor-views');

        Event::listen(JobProcessing::class, JobStartedListener::class);
        Event::listen(JobProcessed::class, JobSucceededListener::class);
        Event::listen(JobFailed::class, JobFailedListener::class);
    }
}