<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'model_type',
        'model_id',
        'file_full_name',
        'file_name',
        'extension',
        'collection_type',
        'disk',
        'size',
    ];


}
