<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'file_name',
        'file_path'
    ];



    public function Contract()
    {
        return $this->belongsTo(Contracts::class ,'contract_id');
    }
}
