<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Job extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = [
        'user_id',
        'tarif_id',
        'card_id',
        'status',
        'price',
        'date_start',
        'date_end',
        'amount',
        'type'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function job_status()
    {
        return $this->hasOne(JobStatus::class);
    }
}
