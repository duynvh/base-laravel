<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 22:47
 */

namespace Module\Acl\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'address',
        'password',
        'day_of_birthday',
        'job_position',
        'phone',
        'gender',
        'website',
        'skype',
        'facebook',
        'twitter',
        'google_plus',
        'youtube',
        'github',
        'interest',
        'about',
        'permissions',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'dob',
    ];

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFullName()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }


}