<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function createdAdmins()
    {
        return $this->hasMany(Admin::class, 'admin_id', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function isSuperAdmin()
    {
        return $this->is_super_admin;
    }
}
