<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'first_name',
        'last_name',
        'username',
        'email',
        'avatar_type',
        'avatar_location',
        'password',
        'balance',
        'company_type',
        'company_name',
        'balance',
        'status',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function card()
    {
        return $this->hasMany(Card::class);
    }
    public function car()
    {
        return $this->hasMany(Car::class);
    }

    public function phone_number()
    {
        return $this->hasMany(Phone_number::class);
    }


    public function support_task()
    {
        return $this->hasMany(Support_task::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contracts::class,'user_id');
    }
    public function ContractFile()
    {
        return $this->hasMany(ContractFile::class ,'contract_id');
    }
    
    public function history_of_balance_replenishment()
    {
        return $this->hasMany(History_of_balance_replenishment::class);
    }

    public function history_of_card_replenishment()
    {
        return $this->hasMany(History_of_card_replenishment::class);
    }

    public function card_job()
    {
        return $this->hasMany(CardJob::class,  'user_id');
    }
    public function job_status()
    {
        return $this->hasMany(JobStatus::class,  'user_id');
    }


    public function isAdmin() {

        foreach ($this->roles()->get() as $role)
        {
            if ($role->name)
            {
                return true;
            }
        }

        return false;
    }
}
