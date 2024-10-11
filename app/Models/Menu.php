<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
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
    public function currentLang()
    {
        if ($this->langParent != null ) {
            $childs = $this->langParent->langChildren;
            return $this->getCurrentLangRecord($childs);
        } else {
            $childs = $this->langChildren;
            return $this->getCurrentLangRecord($childs);
        }
    }

    private function getCurrentLangRecord($records)
    {
        $locale = app()->getLocale();
        foreach ($records as $record) {
            if ($record->langs && $record->langs->locale == $locale) {
                return $record;
            }
        }
        return $this;
    }
}
