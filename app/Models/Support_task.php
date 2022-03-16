<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Support_task extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'theme',
        'message',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

