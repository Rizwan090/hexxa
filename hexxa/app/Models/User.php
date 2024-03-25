<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Emargareten\TwoFactor\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , TwoFactorAuthenticatable ;

    /**
     * The attributes that are mass assignable.
     *
//     * @var array<int, string>
//     */
////    protected $fillable = [
////        'name', 'username', 'email', 'github_id', 'github_token', 'github_refresh_token', 'google_id',
////    ];
////


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function create(array $attributes)
    {
    }


    public function post()
    {
        return $this->hasMany(Post::class);
    }


    public function unlockedPosts()
    {
        return $this->belongsToMany(Post::class, 'user_post_purchases')->withTimestamps();
    }

    public function hasUnlockedPost($postId): bool
    {
        return $this->unlockedPosts->contains('id', $postId);
    }


}
