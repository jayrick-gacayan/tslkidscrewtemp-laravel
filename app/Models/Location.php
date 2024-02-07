<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "address",
        "minimum_age",
        "admin_id"
    ];

    public function admin_director(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
