<?php

namespace Module\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class ContactReply extends Model
{
    protected $table = 'contact_replies';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'message',
        'contact_id',
    ];
}