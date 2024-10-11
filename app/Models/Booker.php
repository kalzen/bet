<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booker extends Model
{
    protected $guarded = [];
    use HasFactory;

    /**
     * Get the codes associated with the booker.
     */
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

    public function getAvailableLang()
    {
        $locale = app()->getLocale();
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
