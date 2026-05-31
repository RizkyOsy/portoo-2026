<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read',
        'read_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'read_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (ContactMessage $contactMessage) {
            if ($contactMessage->is_read && blank($contactMessage->read_at)) {
                $contactMessage->read_at = now();
            }

            if (! $contactMessage->is_read) {
                $contactMessage->read_at = null;
            }
        });
    }
}