<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param $query
     * @return void
     */
    public function scopeEmployers($query): void
    {
        $query->where('role_id', Role::EMPLOYER_ID);
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeEmployees($query): void
    {
        $query->where('role_id', Role::EMPLOYEE_ID);
    }

    /**
     * @return HasOne
     */
    public function vacation(): HasOne
    {
        return $this->hasOne(Vacation::class);
    }

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return bool
     */
    public function isEmployee(): bool
    {
        return $this->role_id == +Role::EMPLOYEE_ID;
    }

    /**
     * @return bool
     */
    public function isEmployer(): bool
    {
        return $this->role_id == +Role::EMPLOYER_ID;
    }

    /**
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role->title === $role;
    }
}
