<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_name',
        'email',
        'password',
        'city',
        'country',
        'address',
        'industry',
        'state',
        'description',
        'website_url',
        'phone',
        'docs',
        'last_login_ip',
        'last_login_time',
        'last_login_metadata',
    ];

    /**
     * Get all the company's activities.
     */
    public function activities(): MorphMany
    {
        return $this->morphMany(LogActivity::class, 'causerable');
    }

}
