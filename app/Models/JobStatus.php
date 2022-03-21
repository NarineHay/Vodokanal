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
        'volume',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
    public function job_status()
    {
        return $this->belongsTo(JobStatus::class, 'job_id');
    }
}
