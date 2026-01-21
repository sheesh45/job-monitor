<?php

use Illuminate\Queue\Events\JobProcessing;
use Sheesh\JobMonitor\Models\JobMonitor;

class JobStartedListener
{
    public function handle(JobProcessing $event)
    {
        JobMonitor::create([
            'job_id'     => $event->job->getJobId(),
            'job_name'   => $event->job->resolveName(),
            'queue'      => $event->job->getQueue(),
            'connection' => $event->connectionName,
            'status'     => 'running',
            'attempts'   => $event->job->attempts(),
            'payload'    => json_encode($event->job->payload()),
        ]);
    }
}
