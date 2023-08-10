<?php

namespace App\Models;

// use Illuminate\Contracts\auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'state',
        'phone',
        'description',
        'personal_image',
        'business_image',
        'cnic_front_image',
        'cnic_back_image',
        'cv',
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
