<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal_location extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip',
        'name',
        'address',
        'number',
        'lat',
        'lng',
        'status'

    ];
    public function safety_system()
    {
        return $this->hasMany(Safety_system::class);
    }
}
