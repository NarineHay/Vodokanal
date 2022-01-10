<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'tarif_id',
        'card_id',
        'price',
        'status',
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
        return $this->belongsTo(JobStatus::class);
    }
}
