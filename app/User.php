<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasApiTokens;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // if a consultancy is registered to a user. 
    public function consultancies()
    {
        return $this->hasMany(Consultancy::class);
    }

    
    public function inbox()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    // a user's sent messages
    public function outbox()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
