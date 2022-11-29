<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginGoogle extends Model
{
    use HasFactory;
    protected $table='user';
    protected $fillable = [
        'name',
        'password',
        'email',
        'SDT',
        'DiaChi',
        'avatar',
        'HinhThuc',
        'trangthai',
        'level'
    ];
    protected $primaryKey = 'id';

}
