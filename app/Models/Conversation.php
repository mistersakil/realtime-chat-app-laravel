<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;


    /**
     * Fillable attribute
     *
     * @var fillable
     */
    protected $fillable = ['sender_id', 'receiver_id', 'last_time_message'];

    /**
     * Get the messages for the conversation
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Get the user that owns the conversation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
