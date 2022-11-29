<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    protected $fillable = [
        'user_id',
        'hoten',
        'sdt',
        'diachi',
        'thanhtien',
        'ghichu',

    ];
    public function chitiethoadon()
    {
        return $this->hasMany('App\Models\ChiTietHoaDon', 'id_HoaDon');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('hoten', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
