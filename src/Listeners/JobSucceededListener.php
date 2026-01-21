<?php

use Illuminate\Queue\Events\JobProcessed;

class JobSucceededListener
{
    public function handle(JobProcessed $event)
    {
        $job = JobMonitor::where('job_id', $event->job->getJobId())
            ->latest()
            ->first();

        if (! $job) return;

        $job->update([
            'status'   => 'success',
            'duration' => $job->created_at->diffInMilliseconds(now()) / 1000
        ]);
    }
}
