<?php

namespace Module\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Module\Acl\Models\User;

class Tag extends Model
{
    protected $table = 'tags';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }

    protected static function boot()
    {
        parent::boot();
        self::deleting(function (Tag $tag) {
            $tag->posts()->detach();
        });
    }
}