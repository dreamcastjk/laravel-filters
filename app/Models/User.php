<?php

namespace App\Models;

use App\Traits\Genders;
use App\Traits\Statuses;
use App\Filters\UsersFilter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Statuses, Genders;

    /**
     * @var int
     */
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User additional information.
     *
     * @return HasOne
     */
    public function info() : HasOne
    {
        return $this->hasOne(UserInfo::class);
    }

    /**
     * @param Builder $query
     * @param UsersFilter $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, UsersFilter $filters)
    {
        return $filters->apply($query);
    }
}
