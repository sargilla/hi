<?php

namespace App\Models;

use App\ExposePermissions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Sigma\Flatlab\Notifications\PasswordResetNotification as ResetPasswordNotification;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable, ExposePermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'settings',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['all_permissions','can'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'settings' => 'json'
    ];

    /*
     * Sobreescribe el template con una nueva notificacion
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
