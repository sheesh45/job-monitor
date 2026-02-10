<?php

namespace JobMonitor\Commands;

class CleanOldJobsCommand extends Command
{
    protected $signature = 'job-monitor:clean {days=7}';

    public function handle()
    {
        JobMonitor::where('created_at', '<', now()->subDays($this->argument('days')))
            ->delete();
    }
}
