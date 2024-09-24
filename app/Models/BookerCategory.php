<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BookerCategory extends Model
{
    protected $guarded = [];
    // public function bookers()
    // {
    //     return $this->hasMany(Booker::class, 'booker_category_id');
    // }
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function bookers()
    {
        return $this->hasMany(Booker::class)->withTimestamps();
    }
    public function getUrlAttribute()
    {
        return '/danh-muc-booker/' . $this->slug;
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function($category)
        {
            $category->slug = Str::slug($category->name);
        });
        static::updating(function($category)
        {
            $category->slug = Str::slug($category->name);
        });
    }
}
