<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'offered_job_id',
        'expected_salary',
        // 'cv_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function job()
    {
        return $this->belongsTo(OfferedJob::class);
    }
}
