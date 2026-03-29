<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'user_id',
    ];

    /**
     * Bài viết thuộc về một người dùng (tác giả)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
