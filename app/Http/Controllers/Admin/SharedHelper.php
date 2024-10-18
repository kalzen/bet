<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Lang;

class SharedHelper
{
    public static function getAvailableLang($lang = null)
    {
        $locale = app()->getLocale();
        if ($lang->langs === null) {
            return null;
        }
        if($lang->langParent == null){
            if ($lang->langs->locale == $locale) {
                return $lang;
            } else {
                $allChildren = $lang->langChildren;
                foreach ($allChildren as $child) {
                    if ($child->langs->locale == $locale) {
                        return $child;
                    }
                }
            }
        } else if ($lang->langChildren()->count() > 0) {
            $upperParent = $lang->langParent;
            return $upperParent->getAvailableLang();
        }
        return null;
    }
    public static function getExcludedFormLangs($record)
    {
        $formLangs = collect([]);
        $formLangs = self::excludeLangs($record);
        if ($record && $record->langs) {
                $formLangs->push($record->langs);
        }
        return $formLangs;
    }

    public static function getExcludedModalLangs($record)
    {
        $modalLangs = collect([]);
        $modalLangs = self::excludeLangs($record);
        return $modalLangs;
    }
    
    private static function excludeLangs($record)
    {
        $allLangs = Lang::all();
        if ($record == null) {
            return $allLangs;
        }
        $excludeResult = $allLangs;
        $langChildren = null;
        $langParent = null;
        if ($record->langParent == null) {
            $langParent = $record;
            $langChildren = $record->langChildren;
        } else {
            $langParent = $record->langParent;
            $langChildren = $record->langParent->langChildren;
        }
        $toBeExcluded = array_merge(
            $langChildren->pluck('lang_id')->toArray(),
            [$langParent->langs->id ?? ($langParent->langs->id ?? null)]
        );
        $toBeExcluded = array_filter($toBeExcluded, function ($value) {
            return $value !== null;
        });
        $excludeResult = $allLangs->reject(function ($lang) use ($toBeExcluded) {
            return in_array($lang->id, $toBeExcluded);
        });
        return $excludeResult;
    }
}