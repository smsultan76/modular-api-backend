<?php

namespace Modules\Profile\app\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Profile\Database\Factories\ProfileFactory;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'bio', 'phone', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
