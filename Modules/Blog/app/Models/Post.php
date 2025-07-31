<?php

namespace Modules\Blog\Entities\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\app\Models\User;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}