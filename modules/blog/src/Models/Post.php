<?php

namespace Module\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Module\Acl\Models\User;

class Post extends Model
{
    protected $table = 'posts';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'content',
        'image',
        'is_featured',
        'format_type',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function (Post $post) {
            $post->tags()->detach();
        });
    }
}