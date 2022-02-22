<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardJob extends Model
{
    use HasFactory;
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
        return $this->hasOne(JobStatus::class, 'job_id');
    }
}
