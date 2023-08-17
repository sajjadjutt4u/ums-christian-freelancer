<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class LogActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'causer_id',
        'subject',
        'request_url',
        'request_method',
        'ip',
        'metadata',
        'user_agent',
    ];

    /**
     * Get all the models that own activities.
     */
    public function causer_type(): MorphTo
    {
        return $this->morphTo();
    }
}
