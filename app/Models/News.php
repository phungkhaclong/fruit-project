<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    protected $fillable = [
        'Tieude',
        'image',
        'Noidung',
        'description',
        'TrangThai',
    ];
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('Tieude', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
