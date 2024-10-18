<?php

namespace App\Models;

use App\Http\Controllers\Admin\SharedHelper;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    public function getAvailableLang()
    {
        return SharedHelper::getAvailableLang($this);
    }
    public function langs()
    {
        return $this->belongsTo(Lang::class,'lang_id');
    }
    public function children() {
        return $this->hasMany(Menu::class, 'parent_id');
    }
    public function parent() {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function langChildren() {
        return $this->hasMany(Menu::class, 'lang_parent_id');
    }

    public function langParent() {
        return $this->belongsTo(Menu::class, 'lang_parent_id');
    }
}
