<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'number',
        'date_start',
        'date_end',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ContractFile()
    {
        return $this->hasMany(ContractFile::class ,'contract_id');
    }
}
