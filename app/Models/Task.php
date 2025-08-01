<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // not needed also

class Task extends Model
{
    use HasFactory;

    // one task belongs to one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
