<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CultivationRecord extends Model
{
    public function crop(): BelongsTo
    {
        return $this->belongsTo(crop::class);
    }
}
