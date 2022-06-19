<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'operator_id',
        'shop_id',
        'department_id',
        'problem_id',
        'comment',
        'status_id',
        'operation_response',
        'logs',
    ];

}
