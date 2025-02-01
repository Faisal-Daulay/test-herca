<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = ['payment_id', 'transaction_number', 'date'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $latestTransaction = Transactions::latest()->first();
            $number = $latestTransaction ? intval(substr($latestTransaction->transaction_number, 3)) + 1 : 1;
            $transaction->transaction_number = 'TRX'.str_pad((string) $number, 3, '0', STR_PAD_LEFT);
        });
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
