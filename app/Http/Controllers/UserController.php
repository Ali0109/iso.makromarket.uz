<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use SoftDeletes;

}
