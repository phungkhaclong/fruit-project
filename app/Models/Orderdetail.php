<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'chitiethoadon';
    protected $fillable = [
        'id_hoadon',
        'id_sanpham',
        'TenSP',
        'SoLuong',
        'Gia',
        'ThanhTien',
        'trangthai',
    ];
    public function hoadon()
    {
        return $this->belongsTo('App\Models\HoaDon', 'Id_HoaDon', 'id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('TenSP', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
