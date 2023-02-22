<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    /**
     * Fillable attribute
     *
     * @var fillable
     */
    protected $fillable = ['sender_id', 'receiver_id', 'conversation_id', 'is_read', 'type', 'body'];

    /**
     * Get the conversation that owns the messages
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }


    /**
     * Get the user that owns the messages
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}