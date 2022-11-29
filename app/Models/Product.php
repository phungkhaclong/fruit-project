<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'id',
        'TenSP',
        'Gia',
        'GiaMoi',
        'Image1',
        'Image2',
        'SoLuong',
        'MoTa',
        'TrangThai',
        'MaLoai',
        'DanhMuc',
    ];
    public function BinhLuan()
    {
        return $this->hasMany('App\Models\BinhLuan', 'id_user', 'id');
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('TenSP', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
