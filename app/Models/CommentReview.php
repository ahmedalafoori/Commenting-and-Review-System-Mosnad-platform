<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'content_id',
        'comment_text',
        'rating',
    ];

    // علاقة مع نموذج User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع نموذج Content
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
