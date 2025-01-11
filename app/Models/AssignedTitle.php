<?php

namespace App\Models;

use App\Http\Controllers\Admin\SharedHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AssignedTitle extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use HasFactory;

    protected $fillable = ['lang_parent_id', 'lang_id', 'route_name', 'content', 'title', 'status'];

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
        return $this->belongsTo(AssignedTitle::class, 'lang_parent_id');
    }
    public function langChildren()
    {
        return $this->hasMany(AssignedTitle::class, 'lang_parent_id');
    }
}
