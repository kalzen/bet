<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = [];
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    public function getUrlAttribute()
    {
        return '/san-pham/'.$this->slug;
    }
    public function scopeActive($query) {
        $query->where('status', Product::STATUS_ACTIVE);
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
    public function images()
    {
        return $this->belongsToMany(Image::class)->withTimestamps();
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withTimestamps()->withPivot(['value']);
    }
    public function catalogues()
    {
        return $this->belongsToMany(Catalogue::class)->withTimestamps();
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class)->withTimestamps();
    }
    public function formulaValue($formula)
    {
        $expression = str_replace('B', (int)$this->sale_price, str_replace('A', (int)$this->price , $formula));
        //dd()
        // Replace any whitespace characters with empty strings
        $expression = str_replace(array(' ', '\t', '\n', '\r'), '', $expression);

        // Evaluate the expression using eval()
        $result = @eval('return ' . $expression . ';');
        //eval( '$result = (' . $math. ');' );
        return $result;
    }
    
    public static function boot()
    {
        parent::boot();
        static::creating(function($product)
        {
            $product->slug = $product->slug ?: (Str::slug($product->title));
            $product->user_id = $product->user_id ?: (auth()->user()->id ?? null);
        });
        static::updating(function($product)
        {
            $product->slug = Str::slug($product->title);
        });
    }
}
