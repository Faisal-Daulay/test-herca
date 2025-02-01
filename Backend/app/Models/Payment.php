<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'marketing_id',
        'cargo_id',
        'total_balance',
        'grand_total',
    ];

    public function marketing(): BelongsTo
    {
        return $this->belongsTo(Marketing::class);
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transactions::class);
    }
}
