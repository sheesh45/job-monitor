<?php

namespace Sheesh\JobMonitor\Models;

use Illuminate\Database\Eloquent\Model;

class JobMonitor extends Model
{
    protected $fillable = [
        'job_id',
        'job_name',
        'queue',
        'connection',
        'status',
        'attempts',
        'duration',
        'payload',
        'exception'
    ];
}
