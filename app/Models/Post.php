<?php

namespace App\Models;

use App\Http\Controllers\Admin\SharedHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $guarded = [];
    public function getAvailableLang()
    {
        return SharedHelper::getAvailableLang($this);
    }
    public function getUrlAttribute()
    {
        return '/tin-tuc/' . $this->slug;
    }
    public function scopeActive($query)
    {
        $query->where('status', Post::STATUS_ACTIVE);
    }
    public function scopeIsPromotion($query)
    {
        $query->where('is_promotion', Post::STATUS_ACTIVE);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function langs()
    {
        return $this->belongsTo(Lang::class, 'lang_id');
    }
    public function langParent()
    {
        return $this->belongsTo(Post::class, 'lang_parent_id');
    }
    public function langChildren()
    {
        return $this->hasMany(Post::class, 'lang_parent_id');
    }
    public function images()
    {
        return $this->belongsToMany(Image::class)->withTimestamps();
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = $post->slug ?: self::generateSlug($post);
            $post->user_id = $post->user_id ?: (auth()->user()->id ?? null);
        });

        static::updating(function ($post) {
            $post->slug = self::generateSlug($post);
        });
    }

    public static function generateSlug($post)
    {
        $timestamp = time();
        if (preg_match('/[^\x{0000}-\x{007F}]+/u', $post->title)) {
            return 'post-' . Str::slug($post->langs->name) . '-' . $timestamp . '-' . ($post->id ?? Str::random(6));
        }
        // return Str::slug($post->title) ?: 'post-' . Str::slug($post->langs->name) . '-' . $timestamp . '-' . ($post->id ?? Str::random(6));
        return $post->slug ?: (Str::slug($post->title));
    }
}
