<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'comment_review_id',
        'is_like',
    ];

    // علاقة مع نموذج User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع نموذج CommentReview
    public function commentReview()
    {
        return $this->belongsTo(CommentReview::class);
    }
}
