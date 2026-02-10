@extends('job-monitor::job-monitor.layout')

@section('content')
    <a href="{{ route('job-monitor.index') }}">← Back</a>

    <h2 class="mt-4 font-bold">{{ $job->job_name }}</h2>

    <ul>
        <li><strong>Status:</strong> {{ $job->status }}</li>
        <li><strong>Queue:</strong> {{ $job->queue }}</li>
        <li><strong>Connection:</strong> {{ $job->connection }}</li>
        <li><strong>Attempts:</strong> {{ $job->attempts }}</li>
        <li><strong>Duration:</strong> {{ $job->duration }}s</li>
    </ul>

    @if($job->exception)
        <h3 class="mt-4 text-red-600">Exception</h3>
        <pre>{{ $job->exception }}</pre>
    @endif

    <h3 class="mt-4">Payload</h3>
    <pre>{{ $job->payload }}</pre>
@endsection
