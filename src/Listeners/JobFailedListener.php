<?php

use Illuminate\Queue\Events\JobFailed;

class JobFailedListener
{
    public function handle(JobFailed $event)
    {
        JobMonitor::where('job_id', $event->job->getJobId())
            ->latest()
            ->update([
                'status'    => 'failed',
                'exception' => $event->exception->getMessage()
            ]);
    }
}
