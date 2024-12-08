<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AssignedContent extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    use HasFactory;

    protected $fillable = ['lang_parent_id', 'lang_id', 'route_name', 'content', 'status'];
}
