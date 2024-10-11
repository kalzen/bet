<?php 
namespace App\Http\Controllers\Admin;

use App\Models\Lang;

class SharedHelper
{
    public function getExcludedFormLangs($record)
    {
        $formLangs = collect([]);
        $formLangs = $this->excludeLangs($record);
        if ($record && $record->langs) {
                $formLangs->push($record->langs);
        }
        return $formLangs;
    }

    public function getExcludedModalLangs($record)
    {
        $modalLangs = collect([]);
        $modalLangs = $this->excludeLangs($record);
        return $modalLangs;
    }
    
    private function excludeLangs($record)
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