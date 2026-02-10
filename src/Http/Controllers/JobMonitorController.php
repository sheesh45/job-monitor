<?php

namespace JobMonitor\Controllers;

class JobMonitorController extends Controller
{
    public function index()
    {
        return view('job-monitor::job-monitor.index', [
            'jobs' => JobMonitor::latest()->paginate(20)
        ]);
    }

    public function show(JobMonitor $job)
    {
        return view('job-monitor::job-monitor.show', compact('job'));
    }
}

