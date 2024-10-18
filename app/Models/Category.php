<?php

namespace App\Models;

use App\Http\Controllers\Admin\SharedHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $guarded = [];
    public function getAvailableLang()
    {
        return SharedHelper::getAvailableLang($this);
    }
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function langs() {
        return $this->belongsTo(Lang::class, 'lang_id');
    }
    public function langChildren() {
        return $this->hasMany(Category::class, 'lang_parent_id');
    }
    public function langParent() {
        return $this->belongsTo(Category::class, 'lang_parent_id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
    public function getUrlAttribute()
    {
        return '/danh-muc-tin-tuc/' . $this->slug;
    }
    // public static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($category)
    //     {
    //         $category->slug = Str::slug($category->name);
    //     });
    //     static::updating(function($category)
    //     {
    //         $category->slug = Str::slug($category->name);
    //     });
    // }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = $category->slug ?: self::generateSlug($category);
        });

        static::updating(function ($category) {
            $category->slug = self::generateSlug($category);
        });
    }
    public static function generateSlug($category)
    {
        $timestamp = time();
        if (preg_match('/[^\x{0000}-\x{007F}]+/u', $category->name)) {
            return 'category-' . Str::slug($category->langs->name) . '-' . $timestamp . '-' . ($category->id ?? Str::random(6));
        }
        // return Str::slug($category->name) ?: 'category-' . Str::slug($category->langs->name) . '-' . $timestamp . '-' . ($category->id ?? Str::random(6));
        return Str::slug($category->name);
    }
}
