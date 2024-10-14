<?php

namespace App\Models;

use App\Http\Controllers\Admin\SharedHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booker extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function getAvailableLang()
    {
        $sharedHelper = app(SharedHelper::class);
        return $sharedHelper->getAvailableLang($this);
    }
    public function codes()
    {
        return $this->hasMany(Code::class, 'booker_id');
    }

    public function categories()
    {
        return $this->belongsToMany(BookerCategory::class, 'bookers_categories');
    }

    public function langs()
    {
        return $this->belongsTo(Lang::class,'lang_id');
    }
    public function langParent()
    {
        return $this->belongsTo(Booker::class,'lang_parent_id');
    }
    public function langChildren()
    {
        return $this->hasMany(Booker::class,'lang_parent_id');
    }
}
