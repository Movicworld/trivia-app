<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'wallet_id',
        'balance',
        'is_active',
        'currency'
    ];

    protected $casts = [
        'balance' => 'float',
        'is_active' => 'boolean',
    ];

    /**
     * A Wallet belongs to a User via `user_id`
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Boot function to auto-generate a wallet_id.
     */
    protected static function booted()
    {
        static::creating(function ($wallet) {
            $wallet->wallet_id = strtoupper(str()->random(10));
        });
    }
}
