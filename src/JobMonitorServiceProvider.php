<?php

class JobMonitorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'job-monitor');

        // Publish views (optional override)
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/job-monitor'),
        ], 'job-monitor-views');

        // Queue events
        Event::listen(JobProcessing::class, JobStartedListener::class);
        Event::listen(JobProcessed::class, JobSucceededListener::class);
        Event::listen(JobFailed::class, JobFailedListener::class);
    }
}

