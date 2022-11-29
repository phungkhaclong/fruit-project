<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'name',
        'password',
        'email',
        'SDT',
        'DiaChi',
        'avatar',
        'HinhThuc',
        'trangthai',
        'token',
        'level'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function AauthAcessToken()
    {
        return $this->hasMany('\App\Models\OauthAccessToken');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
    public function checkpermission($permissioncheck)
    {
        $roles = auth()->user()->roles;
        // dd($roles);
        foreach ($roles as $role) {
            $permission = $role->permission;
            // dd($permission); 
            if ($permission->contains('key_code', $permissioncheck)) {
                return true;
            }
        }
        return false;
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name', 'like', '%' . $key . '%');
            // $query = $query->where('level', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
