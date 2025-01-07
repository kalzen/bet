<?php

namespace App\Models;

use App\Http\Controllers\Admin\SharedHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function getAvailableLang()
    {
        return SharedHelper::getAvailableLang($this);
    }

    public function langs()
    {
        return $this->belongsTo(Lang::class, 'lang_id');
    }

    public function langParent()
    {
        return $this->belongsTo(Tip::class, 'lang_parent_id');
    }
    
    public function langChildren()
    {
        return $this->hasMany(Tip::class, 'lang_parent_id');
    }
}
