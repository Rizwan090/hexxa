<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id', // Add this line to include comment_id in mass assignment
        'user_id',
        'body',
        // other fields...
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
