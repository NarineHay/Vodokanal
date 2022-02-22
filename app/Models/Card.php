<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Card extends Model
{
    use HasFactory,  HasApiTokens;

    protected $fillable = [
        'user_id',
        'card_number',
        'balance',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class)->where('status', 1);
    }

    public function history_of_card_replenishment()
    {
        return $this->hasMany(History_of_card_replenishment::class);
    }

    public function card_job()
    {
        return $this->hasMany(CardJob::class, 'card_id');
    }

    public function job_status()
    {
        return $this->hasMany(JobStatus::class, 'card_id');
    }
}
