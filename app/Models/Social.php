<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['provider_user_id', 'provider','user'];
    protected $primaryKey = 'user_id';
    protected $table = 'social';
    public function login()
    {
        return $this->belongsTo('app\Models\LoginGoogle', 'user');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

