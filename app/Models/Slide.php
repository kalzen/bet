<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = [];

    public function langs()
    {
        return $this->belongsTo(Lang::class,'lang_id');
    }

    public function langParent()
    {
        return $this->belongsTo(Slide::class,'lang_parent_id');
    }

    public function langChildren()
    {
        return $this->hasMany(Slide::class,'lang_parent_id');
    }

    public function getAvailableLang()
    {
        $locale = app()->getLocale();
        if ($this->langs === null) {
            return null;
        }
        if($this->langParent == null){
            if ($this->langs->locale == $locale) {
                return $this;
            } else {
                $allChildren = $this->langChildren;
                foreach ($allChildren as $child) {
                    if ($child->langs->locale == $locale) {
                        return $child;
                    }
                }
            }
        } else if ($this->langChildren()->count() > 0) {
            $upperParent = $this->langParent;
            return $upperParent->getAvailableLang();
        }
        return null;
    }
}
