<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'langs';

    protected $fillable = ['name', 'locale'];
}