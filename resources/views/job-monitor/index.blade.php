@extends('job-monitor::job-monitor.layout')

@section('content')
    <table>
        <thead>
        <tr>
            <th>Job</th>
            <th>Status</th>
            <th>Duration</th>
            <th>Attempts</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td>{{ class_basename($job->job_name) }}</td>
                <td class="{{ $job->status }}">{{ ucfirst($job->status) }}</td>
                <td>{{ $job->duration ?? '-' }}s</td>
                <td>{{ $job->attempts }}</td>
                <td>
                    <a href="{{ route('job-monitor.show', $job) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $jobs->links() }}
@endsection
