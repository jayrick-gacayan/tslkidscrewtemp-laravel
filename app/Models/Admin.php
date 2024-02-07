<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = [
        "name",
        "email",
        "password",
        "is_super_admin",
        "is_active",
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'is_super_admin' => 'boolean',
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    public function createdAdmins(): HasMany
    {
        return $this->hasMany(Admin::class);
    }
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

}