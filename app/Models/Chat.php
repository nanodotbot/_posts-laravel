<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
    ];

    // table name
    // protected $table = 'chats';

    // primary key
    // public $primaryKey = 'id';

    // timestamps
    // public $timestamps = true; // default
}
