<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $fillable = [
        'firstname',
        'lastname',
        'email_address'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    
}
