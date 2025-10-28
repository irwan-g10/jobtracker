<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'city',
        'province',
        'postal_code',
        'note',
        'job_position_id',
        'job_status_id',
        'job_resource_id',
    ];

    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class);
    }
    public function jobStatus()
    {
        return $this->belongsTo(JobStatus::class);
    }
    public function jobResource()
    {
        return $this->belongsTo(JobResource::class);
    }
}
