<?php
/**
 * Created by PhpStorm.
 * User: vien
 * Date: 2019/3/17
 * Time: 1:59 PM
 */

namespace App\Models\Auth;

use App\Models\Base\AuthBaseModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends AuthBaseModel
{
    use Notifiable;

    protected $table = 'blog_admins';

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}