<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Crop extends Model
{
    public function cultivationRecords(): HasMany
    {
        return $this->hasMany(CultivationRecord::class);
    }

    public function pestControlRecords(): HasMany
    {
        return $this->hasMany(PestcontrolRecord::class);
    }
}
